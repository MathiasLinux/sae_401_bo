<a href="index.php?action=admin&page=qAndA"><button class="returnAdmin"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 12H6M12 5l-7 7 7 7"/></svg>Return</button></a> 
<h3 class="adminQandA">General questions : list of questions</h3>
<form class="formAdmin" action="#" method="post">
    <label>
        <p class="titleAdminQAndA">Question</p>
        <input class="addTitle" type="text" name="question" id="question">
    </label>
    <label>
        <p class="titleAdminQAndA">Answer</p>
        <textarea class="addTitle" type="text" name="answer" id="answer"></textarea>
    </label>
    <input class="yellowButton" type="submit" value="Add new Q&A">
</form>
<div class="listQandA">
    <div class="oneQandA">
        <div class="oneQ">
            <div class="titleQ">Question</div>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit ?</p>
        </div>
        <div class="oneA">
            <div class="titleA">Answer</div>
            <p>Vorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum, ac aliquet odio mattis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum, ac aliquet odio mattis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>
        </div>
    </div>
    <div class="buttonsQandA buttonsQandAQuestions">
        <a class="greenButtonEscapeGames" href="#">Modify question</a>
        <a class="yellowButtonQAndA" href="#">Modify answer</a>
        <a class="redButtonQandA span2" href="#">Delete</a>
    </div>
</div>