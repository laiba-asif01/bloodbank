<?php
namespace App\Controllers;

use App\Models\NotificationModel;

class Notifications extends BaseController
{
    // Show form
    public function index()
    {
        return view('adminpannel/send_notifications');
    }

    public function save()
    {
        $model = new NotificationModel();

        $imgName = null;
        $file = $this->request->getFile('big_picture');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $imgName = $file->getRandomName();
            $file->move('images', $imgName);
        }

        $model->save([
            'notification_title' => $this->request->getPost('notification_title'),
            'external_link'      => $this->request->getPost('external_link'),
            'notification_msg'   => $this->request->getPost('notification_msg'),
            'big_picture'        => $imgName,
            'created_at'         => date('Y-m-d H:i:s')
        ]);

        session()->setFlashdata('success', 'Notification sent successfully!');
        return redirect()->to(base_url('adminpannel/notifications/list'));

    }

    public function list()
    {
        $model = new NotificationModel();
        $notifications = $model->orderBy('id', 'DESC')->findAll();

        // Prepare the full HTML table rows in the controller
        if (empty($notifications)) {
            $data['notificationsTable'] = '<tr><td colspan="7">No notifications found</td></tr>';
        } else {
            $rows = '';
            foreach ($notifications as $row) {
                $rows .= '
                <tr>
                    <td>'.$row['id'].'</td>
                    <td>'.esc($row['notification_title']).'</td>
                    <td>'.esc($row['notification_msg']).'</td>
                    <td>'.($row['external_link']
                        ? '<a class="btn btn-info btn-xs" href="'.esc($row['external_link']).'" target="_blank">Link</a>'
                        : '-').'</td>
                    <td>'.($row['big_picture']
                        ? '<img class="img-rounded h-[70px] w-[70px]" src="'.base_url('images/'.$row['big_picture']).'" alt="No image">'
                        : 'No Image').'</td>
                    <td>
                        <div class="btn-group btn-group-sm">
                            <a class="btn bg-gradient-danger" href="'.base_url('notifications/delete/'.$row['id']).'" 
                               onclick="return confirm(\'Are you sure you want to delete this?\');">
                               <i class="fas fa-trash-alt"></i>
                            </a>
                        </div>
                    </td>
                </tr>';
            }
            $data['notificationsTable'] = $rows;
        }

        return view('adminpannel/notifications_list', $data);
    }


    public function delete($id)
    {
        $model = new NotificationModel();

        if ($model->find($id)) {
            $model->delete($id);
            session()->setFlashdata('success', 'Notification deleted successfully!');
        } else {
            session()->setFlashdata('error', 'Notification not found.');
        }

        return redirect()->to(base_url('adminpannel/notifications/list'));

    }


}