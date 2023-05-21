<style>
header{  
    position: sticky;
    top: 0;
    left: 0;
    right: 0;
    width: 100%;
    height: 90px;
    background-image: linear-gradient(to bottom, white, #e7e0e0, #dbd2d2);
    display: grid;
    grid-template-columns: repeat(12, 1fr);
    align-items: center;
    padding-inline: 2%;
    box-shadow: 0 2px 8px rgba(0,0,0,.3);
    z-index: 1000;
}
header .hum_menu{
    grid-column: span 1;
    place-items: center;
    justify-content: center;
}
.hum_menu button{
    border: none;
    outline: none;
    background-color: transparent;
    cursor: pointer;
}
.hum_menu button span{
    font-size: 30px;
    color: #212121;
}
header .logo{
    grid-column: span 2;
}
.logo span{
    font-size: 2em;
    font-weight: 700;
    color: #212121;
    font-family: cursive;
    word-wrap: nowrap;
}
header .search_bar{
    grid-column: span 6;

}
.search_bar .search_container{
    background-color: white;
    margin-inline: 3%;
    padding-inline: 3%;
    border-radius: 100vw;
    overflow: hidden;
    box-shadow: 0 2px 10px rgba(0,0,0,.3);
    display: flex;
    align-items: center;
    justify-content: space-between;
}
.search_container span.fa-filter{
    font-size: 20px;
    color: rgb(177, 169, 169);
    margin-right: 5px;
}
.search_container select{
    border: none;
    width: fit-content;
    outline: none;
    border-top: 1px solid rgb(177, 169, 169);
}
.search_container input{
    width: 93%;
    height: 100%;
    padding: 1rem;
    border: none;
    outline: none;
    background-color: transparent;
    color: gray;
}
.search_container button{
    border: none;
    outline: none;
    background-color: transparent;
}
.search_container button span{
    font-size: 20px;
    color: rgb(177, 169, 169);
    cursor: pointer;
}
header .right_bar{
    grid-column: span 3;
    display: flex;
    justify-content: flex-end;
}
.right_bar button{
    padding: 10px 20px;
    outline: none;
    border: none;
    background-color: rgb(35, 65, 235);
    font-size: 18px;
    color: white;
    border-radius: 8px;
    margin-right: 10px;
    cursor: pointer;
}
header .sidebar{
    position: fixed;
    width: 250px;
    height: calc(100vh - 90px);
    left: -180px;
    top: 90px;
    background-image: linear-gradient(to bottom, #dbd2d2, #e7e0e0, white);
    box-shadow: 2px 8px 8px rgba(0,0,0,.3);
    transition: left .3s, height .3s;
    z-index: 999;
}

.sidebar ul li{
    border-bottom: 1px solid rgba(255,255,255,.8);
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-left: 30px;
    line-height: 60px;
    cursor: pointer;
}
.sidebar ul li:hover,
.sidebar ul li.active{
    background-color: white;
    outline: 1px solid #ddd;
    width: 280px;
    box-shadow: 2px 0 8px rgba(0,0,0,.3);
    border-top-right-radius: 100vw;
    border-bottom-right-radius: 100vw;
    z-index: 1000;
}

.sidebar ul li span{
    font-size: 26px;
    color: #212121;
    width: 70px;
    text-align: center;
}
.sidebar.active{
    left: 0;
}


.main{
    background-image: linear-gradient(to right, gray, white gray);
    margin-left: 250px;
    min-height: calc(100vh - 90px);
    display: grid;
    grid-template-columns: 80px 1fr 80px;
    transition: all .3s;
}
.main.active{
    margin-left: 70px;
}
.sidebar ul li .fa-cog{
    animation: spin 2s linear infinite;
    animation-play-state: paused;
}
.l-setting:hover .fa-cog{
    animation-play-state: running;
}
@keyframes spin{
    100%{
        transform: rotate(360deg);
    }
}
@media (max-width: 700px){
    header{
        grid-template-rows: 60px 30px;
    }

}
</style>

<header>
    <div class="hum_menu">
        <button title="Menu">
            <span class="fa fa-bars"></span>
        </button>
    </div>
    <div class="logo">
        <a href="index.php" title="DBU PRS Home">
            <span>DBU PRS</span>
        </a>
    </div>
    <div class="search_bar">
        <div>
            <form action="result.php" method="post"  class="search_container">
                <span class="fa fa-filter" title="Search by"></span>
                <select name="search_filter" id="" title="Search by">
                    <option value="id">Id</option>
                    <option value="name">Name</option>
                    <option value="serial">Serial</option>
                    <option value="barcode">Barcode</option>
                    <option value="phone">Phone</option>
                    <option value="brand">Brand</option>
                </select>
                <input type="text" name="search_val" placeholder="Search PC Owners" autocomplete="off">
                <button type="submit" name="search"><span class="fa fa-search" title="Search"></span></button>
            </form>
            
        </div>
    </div>
    <div class="right_bar">
        
        <form action="login.php">
            <button  type="submit">Logout</button>
        </form>
    </div>
    <aside class="sidebar active">
        <ul>
            <li>
                <p>Home</p>
                <span class="fa fa-home"></span>
            </li>
            <li>
                <p>Register Pc</p>
                <span class="fa fa-hand-o-right"></span>
            </li>
            <li>
                <p>Manage Pc Owner</p>
                <span class="fa fa-location-arrow"></span>
            </li>
            <li>
                <p>My Profile</p>
                <span class="fa fa-user"></span>
            </li>
            <li class="l-setting">
                <p>Setting</p>
                <span class="fa fa-cog"></span>
            </li>
            <li>
                <p>Logout</p>
                <span class="fa fa-sign-out"></span>
            </li>
        </ul>
    </aside>
</header>
