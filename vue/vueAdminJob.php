<div class="yellowReturn">
    <a href="index.php?action=admin&page=jobs">
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#000000"
             stroke-width="1.5" stroke-linecap="butt" stroke-linejoin="round">
            <path d="M19 12H6M12 5l-7 7 7 7"/>
        </svg>
        Return</a>
</div>
<form class="formAdminJob" action="index.php?action=admin&page=addJob" method="post">
    <h2 class="titleUnderline">Titles</h2>
    <label>
        <p>Title English</p>
        <input type="text" name="title" id="title">
    </label>
    <label>
        <p>Title French</p>
        <input type="text" name="titleFR" id="titleFR">
    </label>
    <h2 class="titleUnderline">Infos</h2>
    <label>
        <p>Type of position English</p>
        <input type="text" name="position" id="position">
    </label>
    <label>
        <p>Type of position French</p>
        <input type="text" name="positionFR" id="positionFR">
    </label>
    <h2 class="titleUnderline">Tasks</h2>
    <div class="textAreaJob">
        <label class="labelTextArea" for="task">Task English</label>
        <textarea name="task" id="task" cols="24" rows="10"></textarea>
    </div>
    <div class="textAreaJob">
        <label class="labelTextArea" for="taskFR">Task French</label>
        <textarea name="taskFR" id="taskFR" cols="24" rows="10"></textarea>
    </div>
    <h2 class="titleUnderline">Strength</h2>
    <div class="textAreaJob">
        <label class="labelTextArea" for="strength">Strength English</label>
        <textarea name="strength" id="strength" cols="24" rows="10"></textarea>
    </div>
    <div class="textAreaJob">
        <label class="labelTextArea" for="strengthFR">Strength French</label>
        <textarea name="strengthFR" id="strengthFR" cols="24" rows="10"></textarea>
    </div>
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