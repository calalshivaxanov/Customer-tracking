<?php


class helper
{
    static function yonlendir($url)
    {
        header('Location: '.$url);
    }

    static function temizle($value) //Bu funksiya strip_tags əmrini qısaltmaq üçündür...Yəni html kodlarından yayındırmaq
    {
        return strip_tags($value);
    }

    static function alert($style,$msg) //Bu metod Xəta metodudur
    {
        echo '<div class="alert alert-'.$style.'">'.$msg.'</div>';
    }

}