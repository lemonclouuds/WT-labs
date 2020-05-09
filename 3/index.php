<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>3 лаба</title>
</head>
<body>
<form  method="post">
    <input type="text" name="dir" required><br><br>
    <input type="submit" value="Сканировать">
</form>
</body>


<?php

    function dirSize($dirname) {
        $totalsize = 0;
        if ($dirstream = opendir($dirname)) {
            while ($filename = readdir($dirstream)) {
                if ($filename != "." && $filename != "..")
                {
                    if (is_file($dirname . "/" . $filename))
                        $totalsize += filesize($dirname . "/" . $filename);

                    if (is_dir($dirname . "/" . $filename))
                        $totalsize += dirSize($dirname . "/" . $filename);
                }
            }
        }
        closedir($dirstream);
        return $totalsize;
    }

    function getExtension($filename) {
        return end(explode(".", $filename));
    }

    function scanning($dir, $spaceCount)
    {
        $count = 0;
        $fdir = scandir($dir);

        unset($fdir[array_search('.', $fdir, true)]);
        unset($fdir[array_search('..', $fdir, true)]);

        if (count($fdir) < 1){
            echo "Пусто. <br>";
            return 0;
        }


        foreach($fdir as $file){
            $space = '';

            //считаем вложенность
            for ($i=1; $i <= $spaceCount; $i++) {
                $space = $space . '---';          
            }

            if (is_dir($dir . '/' . $file)){ //проверяем, директория ли или файл
                $dirsize = intdiv(dirSize($dir . '/' . $file), 1024); //байты в килобайты
                $stat = stat($dir . '/' . $file);
                echo "<strong>" . $space . '<img src="icons/folder.ico" width="20" height="20">' . $file."</strong>" . " Размер: $dirsize Kb, Дата создания: " . date("F d Y H:i:s", $stat[ctime]) . ", Дата модификации: " . date("F d Y H:i:s", $stat[mtime]) . ", Дата последнего доступа: " . date("F d Y H:i:s", $stat[atime]);
            } else {
                $filesize = intdiv(filesize($dir.'/'.$file), 1024);
                $stat = stat($dir.'/'.$file);
                echo $space . '<img src="icons/file.ico" width="20" height="20">' . $file .  " Размер $filesize Kb, Дата создания: " . date("F d Y H:i:s", $stat[ctime]) . ", Дата модификации: " . date("F d Y H:i:s", $stat[mtime]) . ", Дата последнего доступа: " . date("F d Y H:i:s", $stat[atime]);

                if(getExtension($dir . '/' . $file) == 'txt'){
                    $section = file_get_contents($dir . '/' . $file, FALSE, NULL, 0, 99);
                    echo $section;
                }

                //проверяем только png и jpg
                if((getExtension($dir . '/' . $file) == 'png') || (getExtension($dir . '/' . $file) == 'jpg')){
                    $GLOBALS['gCount'] += filesize($dir . '/'.  $file);
                }
            }

            echo "<br>";

            if(is_dir($dir.'/'.$file)){
                $spaceCount++;
                $count += scanning($dir.'/'.$file, $spaceCount);
                $spaceCount--;
            } else {
                $count += filesize($dir.'/'.$file);//
            }
        }

        return $count;
    }

    if(isset($_POST['dir'])){
        if (file_exists($_POST['dir'])){
            $gCount = 0;
            $count = scanning($_POST['dir'],0);
            $ratio = round($gCount / $count * 100);
            echo "<b>Графические файлы составляют $ratio % всех файлов.</b>";
        } else {
            echo "Ошбика! Не получается открыть заданную директорию.";
        }
    }
?>