<?php
include_once "PDO.php";

function GetOneCommentFromId($id)
{
  global $PDO;
  $response = $PDO->query("SELECT * FROM comment WHERE id = " . $id);
  return $response->fetch();
}

function GetAllComments()
{
  global $PDO;
  $response = $PDO->query("SELECT * FROM comment ORDER BY created_at ASC");
  return $response->fetchAll();
}

function GetAllCommentsFromUserId($userId)
{
  global $PDO;
  $response = $PDO->query(
    "SELECT comment.*, user.nickname "
      . "FROM comment LEFT JOIN user on (comment.user_id = user.id) "
      . "WHERE comment.user_id = $userId "
      . "ORDER BY comment.created_at ASC"
  );
  return $response->fetchAll();
}

function GetAllCommentsFromPostId($postId)
{
  global $PDO;
  // $response = $PDO->query("SELECT comment.*, user.nickname FROM comment INNER JOIN user ON comment.user_id = user.id WHERE post_id = " . $postId);

  // $response = $PDO->query("SELECT user.nickname, comment.created_at, comment.content FROM user LEFT JOIN comment ON comment.user_id = user.id WHERE comment.post_id =" . $postId);

  $response = $PDO->query(
    "SELECT comment.*, user.nickname "
      . "FROM comment LEFT JOIN user on (comment.user_id = user.id) "
      . "WHERE comment.post_id = $postId "

  );

  return $response->fetchAll();
}
