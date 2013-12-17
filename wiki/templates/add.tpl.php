
<div id="addTopic">
    <a href="javascript:closeAddTopic()" id="close">X</a>
    <h2 align="center">Add A New Topic</h2>
    <form action="" method="POST" id="formAdd">
        <label>Topic</label>
        <input type="text" name="topic">

        <label><a href="javascript:addNewElement()">Add a new element</a></label>
        <div id="Elements">
            <label>Element</label>
            <textarea name="elements[]"></textarea>
        </div>
        <button type="submit" name="addTopic" value="True">Add Topic</button>
        <button type="button" onclick="javascript:clearForm();">Clear</button>
    </form>
</div>

<div id="addTopicLayer"></div>
