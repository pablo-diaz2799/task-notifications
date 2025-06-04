<?php

declare(strict_types=1);

namespace Lightit\Shared\App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Lightit\Backoffice\Tasks\Domain\Models\Task;

class TaskAssigned extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(private readonly Task $task)
    {
    }

    /**
     * @return array<int, string>
     */
    public function via(): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return new MailMessage()
            ->markdown('mail.task-assigned', [
                'task' => $this->task,
                'head' => 'Task Assigned',
            ]);
    }

    /**
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            
        ];
    }
}
