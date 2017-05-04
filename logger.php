
<?php
Class Logger {

    private $file;
    private $cols = [];
    private $date_format = "Y-m-d h:i:s";
    /**
     * Constructor for Hatcher Logger
     * @param string    $file        The file to write to. Ensure write perms.
     * @param bool|null $reset       [Optional] If set to TRUE the file will be erased at start.
     * @param string    $date_format [Optional] Date() format to override default "Y-m-d H:i:s"
     */
    public function __construct(string $file, bool $reset = null, string $date_format = null) {

        $this->file = $file;
        $this->cols = $cols;

        // Reset the file
        if ($reset) {
            file_put_contents($this->file, "");
        }

        // change the date format
        if (!empty($date_format)) {
            $this->date_format = $date_format;
        }

    }

    /**
     * Line writer for the log
     * @param  array            $data       An array containing data for each column
     * @return string|boolean               Returns the number of bytes that were written to the file, or FALSE on failure.
     */
    public function out(array $data) {
        array_unshift($data, date($this->date_format));
        return file_put_contents($this->file, "\n" . implode(" \t ", $data), FILE_APPEND);
    }
}

?>