<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" class="pt-4">
    
    <div class="form-group">
        <lable for="userInput">Enter your sentences</lable>
        <input type="text" name="userInput" id="userInput" class="form-control">
    </div>
    <button type="submit" name="btn" value="submit" class="btn btn-primary">Submit</button>

</form>