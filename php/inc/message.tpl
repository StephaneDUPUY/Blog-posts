<li class="message">
    <h3 title="Passions : <?=implode(", ", $message['user']['passions'])?>"><?=$message['user']['name']?></h3>
    <p><?= htmlspecialchars($message['body']) ?></p>
    <h4 class="date"><?=displayHRDate($message['date'])?></h4>
    <?php if (!isset($noLink)): ?>
    <a class="addmessage addcomment" href="addcomment.php?messageid=<?=$id?>"><span>?</span><em>commenter ce message</em></a>
    <?php endif; ?>
    <?php if (!empty($message['comments'])): ?>
    <ul class="message-comments">
        <?php foreach ($message['comments'] as $comment): ?>
        <li class="comment"><?=$comment['user']['name']?> a commenté <?=displayHRDate($comment['date'])?> : <?=$comment['body']?></li>
        <?php endforeach; ?>
    </ul>
    <?php endif; ?>
</li>