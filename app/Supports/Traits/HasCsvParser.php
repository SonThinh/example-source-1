<?php

namespace App\Supports\Traits;

use Illuminate\Support\Arr;

trait HasCsvParser
{
    public array $headers_map = [];
    public array $headers_index = [];
    public array $headers = [];
    public array $keys = [];

    public function mapHeaders($line)
    {
        foreach ($line as $i => $val) {
            $this->headers_index[$i] = $this->headers_map[$val] ?? $val;
        }
    }

    /** ^_^ */
    function defuseBo0m($text)
    {
        $bom = pack('H*', 'EFBBBF');
        return preg_replace("/^$bom/", '', $text);
    }

    /** ^_^ */
    function defuseBo0mStream(&$stream)
    {
        if (fgets($stream, 4) !== "\xef\xbb\xbf")
            rewind($stream);
    }

    function mapRecord($record): array
    {
        $result = [];
        foreach ($record as $i => $col) {
            $result[$this->keys[$i]] = $col;
        }

        return $result;
    }
}
