<?php

/**
 * @param PageAbstract $section
 * @return string
 */
function section(PageAbstract $section){
    $uid = $section->uid();
    $content = snippet('home' , [], true);
    if($content !== false){
        $video = backgroundVideo($section);
        $gif = backgroundGif($section);
        return implode("\n", array_filter([$content, $video, $gif]));
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
    if($gif){
        return '<div class="bg bg--gif" style="background-image: url(' . $gif->url() . ');"></div>';
    }
   return "<!-- Warning: no .gif found in " . $section->diruri() . " -->";
}
