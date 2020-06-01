<?php

namespace App\Controller;

class CommentsController extends AppController{

    public function add(){
        $this->log('テスト');
        $comment = $this->Comments->newEntity();
        if($this->request->is('post')){
            //後で調査
            $comment = $this->Comments->patchEntity($comment, $this->request->data);
            if($this->Comments->save($comment)){
                $this->Flash->success('Comment Add Success!');
                return $this->redirect(['controller'=>'Posts','action'=>'view',$comment->post_id]);
            }else {
                //error
                $this->Flash->error('Comment Add Error!');
            }
        }
        $this->set(compact('comment'));

    }

    public function delete($id = null){
        $this->request->allowMethod(['post','delete']);
        $comment = $this->Comments->get($id);
        if($this->Comments->delete($comment)){
            $this->Flash->success('Comment Delete Success!');
        }else{
            $this->Flash->error('Comment Delete Error');
        }
        return $this->redirect(['controller'=>'Posts','action'=>'view',$comment->post_id]);
    }


}


?>