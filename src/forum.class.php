<?php
class Forum
{
	private $connect; //dbh = database handler.
	public function __construct($database)
	{
		$this->connect = $database;
	}

/* function that gets the main forum board */
public function getForum()
{
	$query = $this->connect->prepare('SELECT * FROM `forum_main` ORDER BY `id` ASC');
	try
	{
		$query->execute();
	}
	catch(PDOException $e)
	{
		die($e->getMessage());
	}
	return $query->fetchAll();
}


////    /* test */
//    public function getAvatar()
//    {
//        $query = $this->connect->prepare('SELECT avatar FROM `gebruikers` WHERE `username`=  "Arjen"');
////        $query->bindValue(1, $forumid);
//        try
//        {
//            $query->execute();
//        }
//        catch(PDOException $e)
//        {
//            die($e->getMessage());
//        }
//    }
/* function that gathers the topic list, based off which forum a user is viewing. */
public function getTopics($forumid)
{
	$query = $this->connect->prepare('SELECT * FROM `topics` WHERE `forum`= ?');
	$query->bindValue(1, $forumid);
	try
	{
		$query->execute();
		return $query->fetchAll();
	} 
	catch(PDOException $e)
	{
		die($e->getMessage());
	}
}

/* function that inserts a new topic */
public function addTopic($username, $title, $message, $whatforum, $created)
{
	$query = $this->connect->prepare('INSERT INTO `topics` (`starter`, `title`, `message`, `forum`, `created`) VALUES (?, ?, ?, ?, ?) ');
	$query->bindValue(1, $username);
	$query->bindValue(2, $title);
	$query->bindValue(3, $message);
	$query->bindValue(4, $whatforum);
        $query->bindValue(5, $created);
	try
	{
		$query->execute();
	}
	catch(PDOException $e)
	{
		die($e->getMessage());
	}	
}
    public function plus1($postcount)
    {
        $query = $this->connect->prepare('UPDATE `gebruikers`  SET postcount = postcount + 1 WHERE username = "Arjen" ');
        $query->bindValue(1, $postcount);
        try
        {
            $query->execute();
        }
        catch(PDOException $e)
        {
            die($e->getMessage());
        }
    }
/* function that gathers information about the topic */
public function topicData($topicid) 
{
	$query = $this->connect->prepare('SELECT * FROM `topics` WHERE `id`= ?');
	$query->bindValue(1, $topicid);
	try
	{
		$query->execute();
		return $query->fetch();
	} 
	catch(PDOException $e)
	{
		die($e->getMessage());
	}
}

/* function that gathers information about the replies within the topic. */
public function replyData($topicid) 
{
	$query = $this->connect->prepare('SELECT * FROM `replies` WHERE `topicid`= ?');
	$query->bindValue(1, $topicid);
	try
	{
		$query->execute();
	}
	catch(PDOException $e)
	{
		die($e->getMessage());
	}
	return $query->fetchAll();
}


/* function that inserts a new reply */
public function addReply($message, $username, $topicid, $whatforum, $created)
{
	$query = $this->connect->prepare("INSERT INTO `replies` (`message`, `username`, `topicid`, `forum`, `created`) VALUES (?, ?, ?, ?, ?) ");
	$query->bindValue(1, $message);
	$query->bindValue(2, $username);
	$query->bindValue(3, $topicid);
        $query->bindValue(4, $whatforum);
        $query->bindValue(5, $created);
	try
	{
		$query->execute();
	}
	catch(PDOException $e)
	{
		die($e->getMessage());
	}	
}


/* function that adds up the total amount of topics. */
public function totalTopics($forumid)
{
	$query = $this->connect->prepare("SELECT id FROM topics WHERE forum = ?");
        $query->bindValue(1, $forumid);
        try
	{
		$query->execute();
		return $query->rowCount();
	} 
	catch(PDOException $e)
	{
		die($e->getMessage());
	}
}

/* function that adds up the total amount of replies */
public function totalReplies($forumid)
{
	$query = $this->connect->prepare("SELECT id FROM replies WHERE forum = ?");
        $query->bindValue(1, $forumid);
        try
	{
		$query->execute();
		return $query->rowCount();
	} 
	catch(PDOException $e)
	{
		die($e->getMessage());
	}
}
    public function totalReplies2($forumid)
    {
        $query = $this->connect->prepare("SELECT id FROM replies WHERE topicid = ?");
        $query->bindValue(1, $forumid);
        try
        {
            $query->execute();
            return $query->rowCount();
        }
        catch(PDOException $e)
        {
            die($e->getMessage());
        }
    }

/* function that updates the last post, showing on the main forum board */
public function updatelastPost($username, $whatforum)
{
	$query = $this->connect->prepare('UPDATE `forum_main` SET `lastpost`=? WHERE `id`=? ');
	$query->bindValue(1, $username);
	$query->bindValue(2, $whatforum);
	try
	{
		$query->execute();
	}
	catch(PDOException $e)
	{
		die($e->getMessage());
	}	
}

/* function that updates the last post, showing on the topics page */
public function updatelastReply($username,$topicid)
{
	$query = $this->connect->prepare('UPDATE `topics` SET `lastpost`=? WHERE `id`=? ');
	$query->bindValue(1, $username);
	$query->bindValue(2, $topicid);
	try
	{
		$query->execute();
	}
	catch(PDOException $e)
	{
		die($e->getMessage());
	}	
}


} //end Forum class.	
