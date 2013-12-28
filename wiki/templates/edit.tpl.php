
<div class="topicWindow" id="editTopic">
    <a href="javascript:closeTopicWindow('editTopic')" class="closeLink">X</a>
    <h2 align="center">Edit Topic</h2>
    <form action="" method="POST" id="editTopicForm">
        <label>Topic</label>
        <input type="hidden" value="<?= $topicID; ?>" name="topicID">
        <input type="text" name="topic" value="<?= $topic; ?>">
        <label><a href="javascript:addNewElement('editTopic')">Add a new element</a></label>
        <div class="Elements" id="editTopicElements">
            <?php foreach( $elements as $element ): ?>
                <label>Old Element</label>
                <a href="javascript:void()" class="closeLink" onclick="deleteTopicElement(<?= $element->ID ?>)">X</a>
                <input type="hidden" value="<?= $element->ID ?>" name="oldElementsID[]">
                <textarea name="oldElements[]"><?= $element->Element; ?></textarea>
            <?php endforeach; ?>
        </div>
        <i>Empty fields will be ignored!</i><br>
        <button type="submit" name="editTopic" value="True">Edit Topic</button>
        <button type="button" class="deleteButton" name="deleteTopic" onclick="javascript:deleteTopic('<?= $topicID ?>');" value="True">Delete Topic</button>
        <button type="button" onclick="javascript:clearForm('editTopic');">Clear</button>
    </form>
</div>

