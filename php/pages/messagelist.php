<section>
    <h2>#kiemtao <a href="add.php" class="addmessage"><span>+</span><em>ajouter&nbsp;un&nbsp;message</em></a></h2>
    <ul id="messages-list">
        <?php
            if (!empty($messages)):
                foreach ($messages as $id => $message)
                    require __DIR__."/../inc/message.tpl";
            else: ?>
        <li class="emptiness">
            <p>Une liste vide, c'est triste non ? <a href="add.php" class="addmessage"><span>+</span><em>ajouter&nbsp;un&nbsp;message</em></a></p>
        </li>
        <?php endif; ?>
    </ul>
</section>