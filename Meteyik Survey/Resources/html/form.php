<?php

session_start();

if (!isset($_SESSION['role'])) {
    header("location: ../../Resources/html/redirect.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <meta name="keywords" content="Survey Form Research meteyik mtk Rewards Ethiopia">
    <link href='https://fonts.googleapis.com/css?family=Bree Serif' rel='stylesheet'>
    <link rel="stylesheet" href="../css/formlook.css">
    <meta name="description" content="Fill out surveys get rewards">
    <meta name="author" content="Natan Mekebib">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/formlook.css">
    <script src="../js/formgenerator.js"></script>
    <script src="../js/index.js"></script>
    <base href="../../index.php" target="_self">
    <title>Form Generator</title>
</head>

<body>
    <main>
        <h1>Form Builder</h1>
        <section>
            <div id="generator">
                <!-- <h2>Attributes</h2> -->
                <div id="set_output">
                    <div id="option1" class="options example">
                        <label for="titlebox">Title: </label>
                        <input type="text" id="titlebox" value="">
                        <label for="forminfobox">Description: </label>
                        <input type="text" id="forminfobox" value="" size="50">
                        <label for="occupation">Occupation </label>
                        <select name="occupation" id="occupation" size="1" required>
                            <option value="" selected>Any</option>
                            <option value="Unemployed">Unemployed</option>
                            <option value="Engineer">Engineer</option>
                            <option value="Medicine">Medical Professional</option>
                            <option value="It">IT expert</option>
                            <option value="Artist">Artist</option>
                        </select>
                        <label for="gender">Gender </label>
                        <select name="gender" id="gender" size="1" required>
                            <option value="" selected>Any</option>
                            <option value="M">M</option>
                            <option value="F">F</option>
                        </select>
                        <label for="age">Minimum Age </label>
                        <select name="age" id="age" size="1" required>
                            <option value="" selected>Any</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                            <option value="24">24</option>
                            <option value="25">25</option>
                            <option value="26">26</option>
                            <option value="27">27</option>
                            <option value="28">28</option>
                            <option value="29">29</option>
                            <option value="30">30</option>
                            <option value="31">31</option>
                            <option value="32">32</option>
                            <option value="33">33</option>
                            <option value="34">34</option>
                            <option value="35">35</option>
                            <option value="36">36</option>
                            <option value="37">37</option>
                            <option value="38">38</option>
                            <option value="39">39</option>
                            <option value="40">40</option>
                            <option value="41">41</option>
                            <option value="42">42</option>
                            <option value="43">43</option>
                            <option value="44">44</option>
                            <option value="45">45</option>
                            <option value="46">46</option>
                            <option value="47">47</option>
                            <option value="48">48</option>
                            <option value="49">49</option>
                            <option value="50">50</option>
                            <option value="51">51</option>
                            <option value="52">52</option>
                            <option value="53">53</option>
                            <option value="54">54</option>
                            <option value="55">55</option>
                            <option value="56">56</option>
                            <option value="57">57</option>
                            <option value="58">58</option>
                            <option value="59">59</option>
                            <option value="60">60</option>
                        </select>
                        <span class="usebuttons">
                            <button class="button-26" role="button" onclick="cancelText(); stopRepeat();">Cancel</button>
                            <button class="button-26" role="button" onclick="cancelText(); formHeader(); stopRepeat();">Apply</button>
                        </span>
                    </div>
                    <div id="option2" class="options example">
                        <label for="texttype">Input type: </label>
                        <select id="texttype">
                            <option value="text" selected>Text</option>
                            <option value="email">E-mail</option>
                            <option value="date">Date</option>
                            <option value="url">URL</option>
                            <option value="tel">Telephone</option>
                        </select>
                        <br>
                        <label for="label_input">Label: </label>
                        <input type="text" id="label_input" value="">
                        <br>
                        <label for="placeholder_input">Placeholder: </label>
                        <input type="text" id="placeholder_input" value="Your Answer Here...">
                        <br>
                        <label for="requiredbox">Required Field: </label>
                        <select id="requiredbox">
                            <option value="required" selected>Yes</option>
                            <option value="none">No</option>
                        </select>
                        <span class="usebuttons">
                            <button class="button-26" role="button" onclick="cancelText(); stopRepeat();">Cancel</button>
                            <button class="button-26" role="button" onclick="genText(); textChange(); cancelText(); stopRepeat();">Apply</button>
                        </span>
                    </div>
                    <div id="option3" class="options example">
                        <label for="choicetype">Choice type: </label>
                        <select id="choicetype">
                            <option value="radio" selected>Multiple choice</option>
                            <option value="checkbox">Checkbox</option>
                        </select>

                        <label for="legend_input">Label: </label>
                        <input type="text" id="legend_input" value="Your Choice Below...">
                        <span id="options_container">
                            <label for="options_input">Choice Values: </label>
                            <input type="text" id="options_input" value="">
                            <button class="button-26" role="button" onclick="choiceOptions();">Add</button>
                            <button class="button-26" role="button" onclick="removeChoice();">Remove</button>
                        </span>
                        <span class="usebuttons">
                            <button class="button-26" role="button" onclick="cancelText(); cancelChoice(); stopRepeat();">Cancel</button>
                            <button class="button-26" role="button" onclick="cancelText(); applyChoice(); stopRepeat();">Apply</button>
                        </span>
                    </div>
                    <div id="option4" class="options example">
                        <h4>Are you sure you want to deploy this survey?</h4>
                        <span class="usebuttons">
                            <button class="button-26" role="button" onclick="cancelText(); stopRepeat(); removebtn();">No</button>
                            <form action="Resources/html/saveSurvey.php" method="POST">
                                <span id="hidepost">
                                    <input type="text" id="s_name" name="name">
                                    <input type="text" id="s_desc" name="desc">
                                    <input type="text" id="s_age" name="age">
                                    <input type="text" id="s_questions" name="questions">
                                    <input type="text" id="s_content" name="content">
                                    <input type="text" id="s_gender" name="gender">
                                    <input type="text" id="s_occup" name="occup">
                                </span>
                                <button name="Submit1" class="button-26" role="button" onclick="cancelText(); stopRepeat();">Yes</button>
                            </form>
                        </span>
                    </div>
                </div>
                <!-- <h2>Form Options</h2> -->
                <div id="form_choice">
                    <div id="descriptionbox" class="choice">
                        <div>Description</div>
                        <button class="button-26" role="button" onclick="choice('1');">Add +</button>
                    </div>
                    <div id="textbox" class="choice">
                        <div>Text Field</div>
                        <button class="button-26" role="button" onclick="choice('2'); ">Add +</button>
                    </div>
                    <div id="choicebox" class="choice">
                        <div>Choice Field</div>
                        <button class="button-26" role="button" onclick="choice('3');">Add +</button>
                    </div>
                    <div id="abox">
                        <button class="button-26" role="button" onclick="choice('4'); putData(); makebtn();">Save </button>
                    </div>
                </div>
            </div>
            <div id="form_page" class="example">
                <h2 id="formtitle">Title of your form</h2>
                <p id="formdescription">
                    Your questions will be displayed below.
                </p>
                <form action="Resources/php/submit.php" id="mainform" class="example" method="POST">

                </form>
            </div>
        </section>
    </main>
</body>

</html>