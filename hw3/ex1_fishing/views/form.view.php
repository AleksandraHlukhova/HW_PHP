<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
    <fieldset>
        Name: <input type="text" name="name" /><br />
        Credit Card Number: <input type="text" name="ccn" /><br /> 
        Search Query: <input type="text" name="query" />
        <br /> 
        <input type="submit" name="btn" value="I’m pheeling lucky" />
    </fieldset>
</form>