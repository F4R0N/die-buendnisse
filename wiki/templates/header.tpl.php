<form action="/wiki/" method="GET">
    <?php if (isset($topicID)): ?>
    <a href="javascript:openTopicWindow('editTopic')">Edit</a>
    <?php endif; ?>
    <a href="javascript:openTopicWindow('addTopic')">Add</a>
    <input type="text" name="topic" placeholder="Search...">
    <button type="submid">Suchen</button>
</form>