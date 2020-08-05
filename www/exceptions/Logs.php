<?php


class Logs extends ErrorException
{

    const LOGFILE = __DIR__ . DIRECTORY_SEPARATOR ."log.txt";

    public function writeInLogFile()
    {
        $res =  fopen(self::LOGFILE, 'a+');
        $stringToWrite = date('Y-m-d H:i:s') . ' || ' . $this->file . ' || ' . $this->message . ' || ' .'line ' . $this->line .  "\r\n";
        fwrite($res, $stringToWrite);
        fclose($res);
    }

    public static function showLogs()
    {
        return file(self::LOGFILE, FILE_IGNORE_NEW_LINES);
    }
}