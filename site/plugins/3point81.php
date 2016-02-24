<?php

/**
 * @param PageAbstract $section
 * @return string
 */
function section(PageAbstract $section){
    $snippet = $section->intendedTemplate();
    $content = snippet($snippet , compact('section'), true);
    if($content !== false){
        $bg = supportsBgVideo() ? backgroundVideo($section) : backgroundGif($section);
        return implode("\n", array_filter([$bg, $content]));
    }

    return "<!-- Warning: site/snippets/$snippet.php doesn't exist -->" .
        '<h2>' . $section->title() . '</h2>' .
        '<p>' . $section->text() . '</p>';
}


/**
 * @param PageAbstract $section
 * @param $ext
 * @return mixed
 */
function firstFileWithExt(PageAbstract $section, $ext){
    return $section->files()
        ->filter(function(FileAbstract $f) use ($ext) {
            return strtolower($f->extension()) === strtolower($ext);
        })
        ->first();
}

/**
 * @param PageAbstract $section
 * @return string
 */
function backgroundVideo(PageAbstract $section){
    $mp4 = firstFileWithExt($section, 'mp4');
    if(($poster = $section->images()->findBy('name', 'poster')) || ($poster = firstFileWithExt($section, 'jpg'))){
        $posterAttr = 'poster="' . $poster->url() . '"';
    }
    if($mp4){
        return '<div class="bg bg--video" ' . $posterAttr . '>
                    <video loop>
                        <source src="' . $mp4->url() . '">
                    </video>
                </div>';
    }
    return "<!-- Warning: no .mp4 found in " . $section->diruri() . " -->";
}

/**
 * @param PageAbstract $section
 * @return string
 */
function backgroundGif(PageAbstract $section){
    $gif = firstFileWithExt($section, 'gif');
    $color = preg_replace('/[^0-9a-f]/', '', $section->background());
    if($gif){
        return '<div class="bg bg--gif" 
            style="background-color: #'. $color . '; background-image: url(' . $gif->url() . ');"></div>';
    }
   return "<!-- Warning: no .gif found in " . $section->diruri() . " -->";
}


function supportsBgVideo(){
    return !(preg_match('/iPhone|iPod|iPad|BlackBerry|Android/', visitor::ua()) || r::has('mobile'));
}
