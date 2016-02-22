<?php

/**
 * @param PageAbstract $section
 * @return string
 */
function section(PageAbstract $section){
    $uid = $section->uid();
    $content = snippet($uid , compact('section'), true);
    if($content !== false){
        $bg = supportsBgVideo() ? backgroundVideo($section) : backgroundGif($section);
        return implode("\n", array_filter([$content, $bg]));
    }
    return "<!-- Warning: site/snippets/$uid.php doesn't exist -->" .
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
        ->filter(function($f) use ($ext) {
            return $f->extension() === $ext;
        })
        ->first();
}

/**
 * @param PageAbstract $section
 * @return string
 */
function backgroundVideo(PageAbstract $section){
    $mp4 = firstFileWithExt($section, 'mp4');
    // TODO: add back autoplay, cover
    if($mp4){
        return '<div class="bg bg--video">
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
