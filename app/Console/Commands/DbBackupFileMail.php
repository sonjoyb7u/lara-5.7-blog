<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class DbBackupFileMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'database:backup-file-mail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Database backup zip file store and the file to send email.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $filename = "dbbackup-" . Carbon::now()->format('Y-m-d') . ".gz";
        $file_store_dir = "C:/laragon/www/lara-5.7-blog/storage/app/LARA-5.7-BLOG/" . $filename;
//        $this->info($file_store_dir);

        $command = "mysqldump --user=" . env('DB_USERNAME') ." --password=" . env('DB_PASSWORD') . " --host=" . env('DB_HOST') . " " . env('DB_DATABASE') . "  | gzip > " . $file_store_dir;

//        try {

//        } catch (\Exception $exception) {
//            throw $exception;
//        }
        $returnVar = NULL;
        $output  = NULL;

        exec($command, $output, $returnVar);

        Mail::raw('You have a new database backup file.',   function ($message) use ($file_store_dir) {
            $message->to(env('DB_BACKUP_EMAIL'))
                    ->subject('DB Auto-backup Done.')
                    ->attach($file_store_dir);
        });

        $this->info("Database backup complete and Send to this mail.");
    }
}
