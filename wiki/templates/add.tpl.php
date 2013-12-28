
<div class="topicWindow" id="addTopic">
    <a href="javascript:closeTopicWindow('addTopic')" class="closeLink">X</a>
    <h2 align="center">Add A New Topic</h2>
    <form action="" method="POST" id="addTopicForm">
        <label>Topic</label>
        <input type="text" name="topic">

        <label><a href="javascript:addNewElement('addTopic')">Add a new element</a></label>
        <div class="Elements" id="addTopicElements">
            <label>Neues Element</label>
            <textarea name="elements[]"></textarea>
        </div>
        <button type="submit" name="addTopic" value="True">Add Topic</button>
        <button type="button" onclick="javascript:clearForm('addTopic');">Clear</button>
    </form>
</div>

<div id="Layer"></div>
