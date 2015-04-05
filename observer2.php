<?php

class User implements SplSubject{
    private $firstname;

    /**
     * @return mixed
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param mixed $firstname
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
        $this->notify();
    }

    /**
     * @return mixed
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param mixed $lastname
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
        $this->notify();
    }
    private $lastname;
    private $observers = [];

    function __construct($firstname, $lastname)
    {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->notify();
    }

    public function attach(SplObserver $observer)
    {
        $this->observers[] = $observer;
    }

    public function detach(SplObserver $observer)
    {
        $index = array_search($observer, $this->observers, true);

        if (false !== $index) {
            unset($this->observers[$index]);
        }
    }

    public function notify(){
        foreach($this->observers as $obs) {
            $obs->update($this);
        }
    }

    public function __toString(){
        return $this->firstname.' '.$this->lastname;
    }
}

class UserFieldObserver implements SplObserver {
    public function update(SplSubject $subject){
        echo "<hr />$subject. has been changed";
    }
}

class UserMailer implements SplObserver {
    public function update(SplSubject $subject){
        echo "<hr />sending mail to $subject";
    }
}

$user = new User('david', 'vansl');
$user->attach(new UserFieldObserver());
$user->attach(new UserMailer());

echo $user;
$user->setFirstname('delphine');
$user->setLastname('vanslam');