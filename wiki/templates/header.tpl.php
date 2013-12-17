<form action="/wiki/" method="GET">
    <?php if (isset($topicID)): ?>
    <a href="javascript:openEditTopic()">Edit</a>
    <?php endif; ?>
    <a href="javascript:openAddNewTopic()">Add</a>
    <input type="text" name="topic" placeholder="Search...">
    <button type="submid">Suchen</button>
</form>