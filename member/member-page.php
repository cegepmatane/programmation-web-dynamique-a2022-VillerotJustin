
<div class="my-2 row">
    <img src="images/<?=$_SESSION['member']['avatar']?>" alt="avatar" class="col-4">
    <div class="col-4">
        <div>
            <label>Username</label>
            <span><?=$_SESSION['member']['username']?></span>
        </div>
        <div>
            <label>Name</label>
            <span><?=$_SESSION['member']['name']?></span>
        </div>
        <div>
            <label>Last Name</label>
            <span><?=$_SESSION['member']['lastName']?></span>
        </div>
        <div>
            <label>Mail</label>
            <a href = "mailto:<?=$_SESSION['member']['mail']?>"><?=$_SESSION['member']['mail']?></a>
        </div>
    </div>
</div>