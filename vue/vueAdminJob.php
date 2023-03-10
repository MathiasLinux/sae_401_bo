<div class="yellowReturn">
    <a href="index.php?action=admin&page=jobs">
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#000000"
             stroke-width="1.5" stroke-linecap="butt" stroke-linejoin="round">
            <path d="M19 12H6M12 5l-7 7 7 7"/>
        </svg>
        Return</a>
</div>
<form class="formAdminJob" action="#" method="post">
    <div class="titleDivAdminJob">
        <input type="text" name="title" id="titile">
        <svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" viewBox="0 0 33 33">
            <g id="Edit" transform="translate(-0.5 -0.5)">
                <path id="Tracé_29" data-name="Tracé 29"
                      d="M26,32.5H5A4.505,4.505,0,0,1,.5,28V7A4.505,4.505,0,0,1,5,2.5h8.01a1.5,1.5,0,0,1,0,3H5A1.5,1.5,0,0,0,3.5,7V28A1.5,1.5,0,0,0,5,29.5H26A1.5,1.5,0,0,0,27.5,28V19.99a1.5,1.5,0,0,1,3,0V28A4.505,4.505,0,0,1,26,32.5Z"
                      transform="translate(0 1)" fill="#fff"></path>
                <path id="Tracé_30" data-name="Tracé 30"
                      d="M23,.5a1.5,1.5,0,0,1,1.061.439l6,6a1.5,1.5,0,0,1,0,2.121l-15,15A1.5,1.5,0,0,1,14,24.5H8A1.5,1.5,0,0,1,6.5,23V17a1.5,1.5,0,0,1,.439-1.061l15-15A1.5,1.5,0,0,1,23,.5ZM26.879,8,23,4.121,9.5,17.621V21.5h3.879Z"
                      transform="translate(3)" fill="#fff"></path>
            </g>
        </svg>
    </div>
    <h2 class="titleUnderline">Infos</h2>
    <label>
        <p>Type of position</p>
        <input type="text" name="" id="">
    </label>
    <h2 class="titleUnderline">Tasks</h2>
    <textarea name="task" id="task" cols="29" rows="10"></textarea>
    <h2 class="titleUnderline">Strength</h2>
    <textarea name="strength" id="strength" cols="29" rows="10"></textarea>
    <div class="displayJob">
        <p class="firstTitleDisplay">Display</p>
        <p class="secondTitleDisplay">Display the job offer for the user</p>
        <div class="divVisibleDisplay">
            <svg xmlns="http://www.w3.org/2000/svg" width="41.3" height="30.854" viewBox="0 0 41.3 30.854" fill="white">
                <g id="Groupe_5" data-name="Groupe 5" transform="translate(0.5 -2.5)">
                    <path id="Tracé_28" data-name="Tracé 28"
                          d="M20.15,2.5a18.19,18.19,0,0,1,8.858,2.363,26.172,26.172,0,0,1,6.381,5.075,34.32,34.32,0,0,1,5.252,7.319,1.5,1.5,0,0,1,0,1.342,34.32,34.32,0,0,1-5.252,7.319,26.172,26.172,0,0,1-6.381,5.075,18.19,18.19,0,0,1-8.858,2.363,18.19,18.19,0,0,1-8.858-2.363,26.172,26.172,0,0,1-6.381-5.075A34.32,34.32,0,0,1-.342,18.6a1.5,1.5,0,0,1,0-1.342A34.32,34.32,0,0,1,4.911,9.938a26.172,26.172,0,0,1,6.381-5.075A18.19,18.19,0,0,1,20.15,2.5ZM37.591,17.927a32.865,32.865,0,0,0-4.443-5.994c-4.023-4.269-8.4-6.433-13-6.433s-8.974,2.164-13,6.433a32.864,32.864,0,0,0-4.443,5.994,32.865,32.865,0,0,0,4.443,5.994c4.023,4.269,8.4,6.433,13,6.433s8.974-2.164,13-6.433A32.864,32.864,0,0,0,37.591,17.927Z"
                          transform="translate(0 0)"></path>
                    <path id="Ellipse_5" data-name="Ellipse 5"
                          d="M5-1.5A6.5,6.5,0,1,1-1.5,5,6.507,6.507,0,0,1,5-1.5Zm0,10A3.5,3.5,0,1,0,1.5,5,3.5,3.5,0,0,0,5,8.5Z"
                          transform="translate(15 13)"></path>
                </g>
            </svg>
            <p>Visible</p>
            <input type="checkbox" name="visible" id="visible">
        </div>
    </div>
    <div class="submitAdminJob">
        <input class="yellowButton" type="submit" value="Save">
    </div>
</form>