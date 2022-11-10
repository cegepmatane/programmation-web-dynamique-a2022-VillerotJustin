
<div>
    <div>
        <label for="">Username</label>
        <span><?=$_SESSION['member']['username']?></span>
    </div>
    <div>
        <label for="">Name</label>
        <span><?=$_SESSION['member']['name']?></span>
    </div>
    <div>
        <label for="">Last Name</label>
        <span><?=$_SESSION['member']['lastName']?></span>
    </div>
    <div>
        <label for="">Mail</label>
        <a href = "mailto: <?=$_SESSION['member']['mail']?>"><?=$_SESSION['member']['mail']?></a>
    </div>
</div>