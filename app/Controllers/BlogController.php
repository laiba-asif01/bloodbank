<?php
namespace App\Controllers;

use App\Models\BlogModel;

class BlogController extends BaseController
{
    public function index()
    {
        $model = new BlogModel();
        $data['blogs'] = $model->findAll();
        return view('adminpannel/admin/blogs/list', $data);
    }



    public function create()
    {
        return view('adminpannel/admin/blogs/add');
    }

    public function save()
    {
        $model = new BlogModel();

        // Image Upload
        $file = $this->request->getFile('blog_image');
        $imgName = null;

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $imgName = $file->getRandomName();
            $file->move('uploads/blogs/', $imgName);
        }

        $model->save([
            'blog_title'   => $this->request->getPost('blog_title'),
            'blog_content' => $this->request->getPost('blog_content'),
            'blog_image'   => $imgName,
            'posted_at'    => date('Y-m-d H:i:s'),
        ]);

        // Success message
        session()->setFlashdata('success', 'Blog added successfully!');
        return redirect()->to('admin/blogs');
    }

    public function edit($id)
    {
        $model = new BlogModel();
        $data['blog'] = $model->find($id);
        return view('adminpannel/admin/blogs/edit', $data);
    }

    public function update($id)
    {
        $model = new BlogModel();

        $file = $this->request->getFile('blog_image');
        $imgName = $this->request->getPost('old_image'); // in case no new image uploaded

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $imgName = $file->getRandomName();
            $file->move('uploads/blogs/', $imgName);
        }

        $model->update($id, [
            'blog_title'   => $this->request->getPost('blog_title'),
            'blog_content' => $this->request->getPost('blog_content'),
            'blog_image'   => $imgName,
            'posted_at'    => date('Y-m-d H:i:s'),
        ]);

        // Success message
        session()->setFlashdata('success', 'Blog updated successfully!');
        return redirect()->to('admin/blogs');
    }

    public function delete($id)
    {
        $model = new BlogModel();
        $model->delete($id);

        // Success message
        session()->setFlashdata('success', 'Blog deleted successfully!');
        return redirect()->to('adminpannel/admin/blogs');
    }
}
