<a href="/">Back</a>
<h1><?php echo $article->title(); ?></h1>

<div style="padding-bottom: 10px">
    <p><?php echo $article->content(); ?></p>
    <p>
        <small>
            <b><?php echo $article->createdAt(); ?></b>
        </small>
    </p>
</div>
<hr>

<div style="padding-top: 10px;padding-bottom: 10px">
    <?php if ($comments != null): ?>
        <?php foreach ($comments as $comment): ?>
            <form method="post" action="/articles/<?php echo $article->id(); ?>">
                <li><b><?php echo $comment->name() ?>:</b> <?php echo $comment->comment() ?>
                    <button type="submit" name="_method" value="DELETE" data-value="xx">X</button>
                    <input type="hidden" name="id" value="<?php echo $comment->id(); ?>">
                </li>
            </form>
        <?php endforeach; ?>
    <?php else: ?>
        no comments
    <?php endif; ?>

</div>
<hr>

<div style="padding-top: 10px">
    <form method="post" action="/articles/<?php echo $article->id(); ?>">
        <p>Enter your name:</p>
        <textarea name="name" id="name" cols="40"></textarea><br>
        <p>Enter your comment:</p>
        <textarea name="comment" id="comment" cols="40" rows="5"></textarea><br>
        <button style="margin-top: 10px" type="submit">Submit</button>
    </form>
</div>