<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use Mail;
use App\Mail\WelcomeEmail;

class SendWelcomeEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    /**
     * Số lân job sẽ thử thực hiện lại
     * var int
     *
     * nếu xét tất cả các job
     * php artisan queue:work --tries=2
     */
    public $tries = 2;

    /**
     * số giây job có thể chạy trước khi timeout
     * var int
     *
     * nếu xét tất cả các job
     * php artisan queue:work --timeout=60
     */
    public $timeout = 60;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $user;
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * thuc thi
     *  php artisan queue:work
     *
     *  restart
     *  php artisan queue:restart
     */

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        sleep(10);

        echo 'Start send email';
        $email = new WelcomeEmail($this->user);
        Mail::to('tuyensinh24hcm@gmail.com')->send($email);

        echo 'End send email';
    }
}
