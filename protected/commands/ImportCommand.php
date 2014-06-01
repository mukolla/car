<?php

class ImportCommand extends CConsoleCommand
{
    public function actionPart($file) {
        $delim=',';  		// Разделитель полей в CSV файле
        $enclosed='"';  	// Кавычки для содержимого полей
        $escaped='\\'; 	 	// Ставится перед специальными символами
        $lineend='\\n';
        $dir = dirname(__FILE__).DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'upload'.DIRECTORY_SEPARATOR.'import';
        $files = CFileHelper::findFiles($dir, array('level'=>0));

        //$files = array( $dir . DIRECTORY_SEPARATOR . $file);

        $ignore = "IGNORE 1 LINES ";
        ini_set('max_execution_time', 0);
        foreach ($files as $file) {

            /*echo "\n" . $file . "\n\n";

            var_dump( file_exists($file));

            die;*/

            $q_import =
                "LOAD DATA INFILE '".
                $file."' INTO TABLE {{temp_import_part}} ".
                "FIELDS TERMINATED BY '".$delim."' ENCLOSED BY '".$enclosed."' ".
                "LINES TERMINATED BY '".$lineend."' ".
                $ignore;
            Yii::app()->db->createCommand($q_import)->execute();
        }
    }

    public function actionCategory() {
        die("2");
    }

    public function actionCar() {
        die("2");
    }
}
