<?php
namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\NotificationModel;
use CodeIgniter\API\ResponseTrait;

class NotificationApi extends BaseController
{
    use ResponseTrait;

    // ✅ Get all notifications
    public function index()
    {
        $model = new NotificationModel();
        $notifications = $model->orderBy('id', 'DESC')->findAll();
        return $this->respond($notifications);
    }

    // ✅ Get single notification
    public function show($id = null)
    {
        $model = new NotificationModel();
        $notification = $model->find($id);

        if (!$notification) {
            return $this->failNotFound('Notification not found');
        }

        return $this->respond($notification);
    }

    // ✅ Create new notification
    public function create()
    {
        $model = new NotificationModel();

        $imgName = null;
        $file = $this->request->getFile('big_picture');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $imgName = $file->getRandomName();
            $file->move('images', $imgName);
        }

        $data = [
            'notification_title' => $this->request->getVar('notification_title'),
            'external_link'      => $this->request->getVar('external_link'),
            'notification_msg'   => $this->request->getVar('notification_msg'),
            'big_picture'        => $imgName,
            'created_at'         => date('Y-m-d H:i:s')
        ];

        $model->insert($data);

        return $this->respondCreated([
            'status'  => 'success',
            'message' => 'Notification created successfully',
            'data'    => $data
        ]);
    }

    // ✅ Update notification
    public function update($id = null)
    {
        $model = new NotificationModel();

        if (!$model->find($id)) {
            return $this->failNotFound('Notification not found');
        }

        $file = $this->request->getFile('big_picture');
        $imgName = $this->request->getVar('old_image');

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $imgName = $file->getRandomName();
            $file->move('images', $imgName);
        }

        $data = [
            'notification_title' => $this->request->getVar('notification_title'),
            'external_link'      => $this->request->getVar('external_link'),
            'notification_msg'   => $this->request->getVar('notification_msg'),
            'big_picture'        => $imgName,
        ];

        $model->update($id, $data);

        return $this->respond([
            'status'  => 'success',
            'message' => 'Notification updated successfully',
            'data'    => $data
        ]);
    }

    // ✅ Delete notification
    public function delete($id = null)
    {
        $model = new NotificationModel();

        if (!$model->find($id)) {
            return $this->failNotFound('Notification not found');
        }

        $model->delete($id);

        return $this->respondDeleted([
            'status'  => 'success',
            'message' => 'Notification deleted successfully'
        ]);
    }
}