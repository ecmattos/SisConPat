<?php

namespace SisConPat\Listeners;

use SisConPat\Events\UserNewEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use Mail;

use SisConPat\Repositories\UserRepository;

class UserNewEmailToAdminEventListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Handle the event.
     *
     * @param  UserNewEvent  $event
     * @return void
     */
    public function handle(UserNewEvent $event)
    {
        $user = $event->getUser();

        #Loop de usuário administradores
        $users_admin = $this->userRepository->allUsersByRole(1);

        foreach($users_admin as $user_admin)
        {   
            $user_admin = $this->userRepository->findUserById($user_admin->user_id);

            Mail::send('emails.users.new_toadmin', ['user_admin' => $user_admin, 'user' => $user], function ($msg) use ($user_admin, $user)
            {
                $msg->from('contato.spmtec@gmail.com', 'CEASA: SisConPat - Contato');
                $msg->to($user_admin->email, $user_admin->name)->subject('SisConPat: Inclusao de nova conta de usuário');
            });
        }
    }
}
