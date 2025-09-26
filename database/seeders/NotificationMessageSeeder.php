<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\NotificationMessage;

class NotificationMessageSeeder extends Seeder
{
    public function run(): void
    {
        $samples = [
            ['title' => 'Welcome!', 'body' => 'Thank you for joining our system.'],
            ['title' => 'Maintenance', 'body' => 'System will be down at 12:00 AM for updates.'],
            ['title' => 'New Feature', 'body' => 'Check out our brand new dashboard module.'],
            ['title' => 'Reminder', 'body' => 'Don’t forget to verify your email address.'],
            ['title' => 'Promo', 'body' => 'Special offer: 50% discount this week only!'],
            ['title' => 'Update', 'body' => 'Version 1.2.3 has just been deployed.'],
            ['title' => 'Alert', 'body' => 'Unusual login detected on your account.'],
            ['title' => 'Info', 'body' => 'We have updated our Terms & Conditions.'],
            ['title' => 'Event', 'body' => 'Join our webinar this Friday at 5 PM.'],
            ['title' => 'Survey', 'body' => 'Help us improve by filling out this quick survey.'],
        ];

        foreach ($samples as $sample) {
            NotificationMessage::create($sample);
        }
    }
}
