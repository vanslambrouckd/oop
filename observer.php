<?php

class NewUserMailer implements SplObserver
{
    public function update(SplSubject $subject)
    {
        echo 'send mail';
    }
}

class NewUserLogger implements SplObserver{
    public function update(SplSubject $user){
        echo 'loggin registered user';
    }
}

class LoginSystem implements SplSubject
{
    private $observers = [];

    public function attach(SplObserver $observer)
    {
        $this->observers[] = $observer;
    }

    public function detach(SplObserver $observer)
    {
        $key = array_search($observer, $this->observers, true);
        if ($key !== false) {
            unset($this->observers[$key]);
        }
    }

    public function notify()
    {
        foreach ($this->observers as $obs) {
            $obs->update($this);
        }
    }
}

$loginSystem = new LoginSystem();
$loginSystem->attach(new NewUserMailer());
$loginSystem->attach(new NewUserLogger());

$userRegistered = true;
if ($userRegistered) {
    $loginSystem->notify();
}
