<?php
class UserController extends AbstractController
{
    public function list() : void
    {
        $manager = new UserManager;
        $data = $manager->findAll();
        $this->render("list", $data);
    }

    public function create() : void
    {
        $manager = new UserManager;
        $this->render("create", []);
    }

    public function checkCreate() : void
    {
        $manager = new UserManager;
        $user = new User($_POST["firstName"], $_POST["lastName"], $_POST["email"]);
        $manager->create($user);
        $data = $manager->findAll();
        $this->render("list", $data);
    }

    public function update(int $id) : void
    {
        $manager = new UserManager;
        $data[] = $manager->findOne($id);
        $this->render("update", $data);
    }

    public function checkUpdate(int $id) : void
    {
        $manager = new UserManager;
        $user = new User($_POST["firstName"], $_POST["lastName"], $_POST["email"]);
        $user->setId($id);
        $manager->update($user);
        $data = $manager->findAll();
        $this->render("list", $data);
        
    }

    public function delete(int $id) : void
    {
        $manager = new UserManager;
        $manager->delete($id);
        $data = $manager->findAll();
        $this->render("list", $data);
    }

    public function show(int $id) : void
    {
        $manager = new UserManager;
        $data[] = $manager->findOne($id);
        $this->render("show", $data);
    }
}