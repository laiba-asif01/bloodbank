<?php
namespace App\Controllers\Api;
use App\Controllers\BaseController;
use App\Models\BlogModel;
use CodeIgniter\API\ResponseTrait;
class BlogApi extends BaseController
{
    use ResponseTrait;

    public function index()
    {
        $model = new BlogModel();

        // Latest 3 blogs (by posted_at)
        $blogs = $model
            ->orderBy('posted_at', 'DESC')
            ->limit(3)
            ->find();

        return $this->respond($blogs);
    }

    // ✅ Get single blog by ID
    public function show($id = null)
    {
        $model = new BlogModel();
        $blog = $model->find($id);

        if (!$blog) {
            return $this->failNotFound('Blog not found');
        }

        return $this->respond($blog);
    }
    // ✅ Create new blog
    public function create()
    {
        $model = new BlogModel();

        $file = $this->request->getFile('blog_image');
        $imgName = null;

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $imgName = $file->getRandomName();
            $file->move('uploads/blogs/', $imgName);
        }

        $data = [
            'blog_title'   => $this->request->getVar('blog_title'),
            'blog_content' => $this->request->getVar('blog_content'),
            'blog_image'   => $imgName,
            'posted_at'    => date('Y-m-d H:i:s'),
        ];

        $model->insert($data);

        return $this->respondCreated([
            'status' => 'success',
            'message' => 'Blog created successfully',
            'data' => $data
        ]);
    }
    // ✅ Update blog
    public function update($id = null)
    {
        $model = new BlogModel();

        $file = $this->request->getFile('blog_image');
        $imgName = $this->request->getVar('old_image');

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $imgName = $file->getRandomName();
            $file->move('uploads/blogs/', $imgName);
        }

        $data = [
            'blog_title'   => $this->request->getVar('blog_title'),
            'blog_content' => $this->request->getVar('blog_content'),
            'blog_image'   => $imgName,
            'posted_at'    => date('Y-m-d H:i:s'),
        ];

        $model->update($id, $data);

        return $this->respond([
            'status' => 'success',
            'message' => 'Blog updated successfully',
            'data' => $data
        ]);
    }
    // ✅ Delete blog
    public function delete($id = null)
    {
        $model = new BlogModel();

        if (!$model->find($id)) {
            return $this->failNotFound('Blog not found');
        }

        $model->delete($id);

        return $this->respondDeleted([
            'status' => 'success',
            'message' => 'Blog deleted successfully'
        ]);
    }
}