<div class="container">
<form action="index.php" method="POST">
    <input type="hidden" name="save">
  <div class="form-group">
        <label for="firstname">Firstname</label>
        <input type="text" class="form-control" id="firstname" name="firstname">
  </div>
  <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name">
  </div>
  <div class="form-group">
        <label for="lastname">Lastname</label>
        <input type="text" class="form-control" id="lastname" name="lastname">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Gender</label>
    <select class="form-control" id="exampleFormControlSelect1" name="gender">
      <option>female</option>
      <option>male</option>
    </select>
  </div>
  <div class="form-group">
    <label for="date">Date</label>
    <input type="date" class="form-control" id="date" name="date">
  </div>
  <div class="form-group">
    <label for="phone">Phone</label>
    <input type="tel" class="form-control" id="phone" name="phone">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Email address</label>
    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" name="email">
  </div>
  <div class="form-group">
    <label for="address">Address</label>
    <textarea class="form-control" id="address" rows="3" name="address"></textarea>
  </div>
  <div class="form-group">
    <label for="comment">Comment</label>
    <textarea class="form-control" id="comment" rows="3" name="comment"></textarea>
  </div>
  <button type="submit" class="btn btn-primary mb-3">Save</button>
</form>
</div>
