<?php

namespace App\Supports\Traits;

trait HasExportCsv
{
    protected $fileHandle;

    function openFile()
    {
        $this->fileHandle = fopen('php://output', 'w');
    }

    function addBomUTf8()
    {
        fwrite($this->fileHandle, (chr(0xEF) . chr(0xBB) . chr(0xBF)));
    }

    function putRowInCsv(array $data)
    {
        fwrite($this->fileHandle, $this->printRow($data));
    }

    function closeFile()
    {
        fclose($this->fileHandle);
    }

    function makeCsvRespHeaders($name): array
    {
        return [
            'Content-Type'        => 'application/octet-stream',
            'Content-Disposition' => 'attachment; filename="' . $name . '"',
        ];
    }

    private function printRow($row): string
    {
        return join(",", array_map(function ($value) {
                $value = str_replace('\\"', '"', $value);
                $value = str_replace('"', '\"', $value);
                return '"' . $value . '"';
            }, $row)) . PHP_EOL;
    }
}
