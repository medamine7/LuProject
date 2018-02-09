
<style class="cp-pen-styles">
html, body {
  background-color: #f0f2fa;
  color: #555f77;
  -webkit-font-smoothing: antialiased;
}



.comments {
  margin: 2.5rem auto 0;
  padding: 0 1.25rem;
  width: 100%;
}

.comment-wrap {
  margin-bottom: 1.25rem;
  display: table;
  width: 100%;
  min-height: 5.3125rem;
}

.photo {
  padding-top: 0.625rem;
  display: table-cell;
  width: 3.5rem;
}
.photo .avatar {
  height: 2.25rem;
  width: 2.25rem;
  border-radius: 50%;
  background-size: contain;
}

.comment-block {
  padding: 1rem;
  background-color: #fff;
  display: table-cell;
  vertical-align: top;
  border-radius: 0.1875rem;
  box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.08);
}
.comment-block textarea {
  width: 100%;
  resize: none;
}

.comment-text {
  margin-bottom: 1.25rem;
}

.bottom-comment {
  color: #acb4c2;
  font-size: 0.875rem;
}

.comment-date {
  float: left;
}

.comment-actions {
  float: right;
}
.comment-actions li {
  display: inline;
  margin: -2px;
  cursor: pointer;
}
.comment-actions li.complain {
  padding-right: 0.75rem;
  border-right: 1px solid #e1e5eb;
}
.comment-actions li.reply {
  padding-left: 0.75rem;
  padding-right: 0.125rem;
}
.comment-actions li:hover {
  color: #0095ff;
}
</style>
</head>

<body>
<div class="comments">
        <div class="comment-wrap">
                <div class="photo">
                    <?php
                        echo '<div class="avatar" style="background-image: url('.$_SESSION["USER_PHOTO"].'); "></div>
                                ';

                        ?>
                </div>
                <div class="comment-block">
                        <form action="nouveau_commentaire.php" method="post">
                                <textarea name="new_comment" id="" cols="30" rows="3" placeholder="Ajouter un commentaire..."></textarea>
                                <?php
                                    $story_id=$_GET["story_id"];
                                    echo '<input type="hidden" name="story_id" value="'.$story_id.'">';
                                    ?>
                                <button type="submit" class="btn btn-sm btn-primary" style="float: right;">Poster</button>
                        </form>
                </div>
        </div>

        <?php

        $query = oci_parse($conn, "SELECT comment_,username,user_photo,commenter_id FROM users,comments where commenter_id=user_id and story_id=$story_id");

        oci_execute($query);

        oci_fetch_all($query, $cmnt, null, null, OCI_FETCHSTATEMENT_BY_ROW);
        //var_dump($cmnt);die();

        foreach ($cmnt as $single) {

            echo "<div class='comment-wrap'>
                    <div class='photo'>";
                            echo '<a title="@'.$single["USERNAME"].'" href="foreign_profile.php?user_id='.$single["COMMENTER_ID"].'"><div class="avatar" style="background-image: url('.$single["USER_PHOTO"].'); ">
                            </div></a>
                    
                </div>
                    <div class="comment-block">
                            <p class="comment-text text-left">'.$single["COMMENT_"].'</p>
                    </div>
            </div>';

        }


        ?>
        
</div>

</div>

</body></html>