<?php

namespace App\Service\Admin;

use App\JsonResponse;
use App\Model\Comment;
use App\Model\User;
use App\Validator\Admin\CommentValidator;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CommentService
 * @package App\Service\Admin
 */
class CommentService
{
    /**
     * @param int $id
     * @return Model
     */
    public function getById(int $id): Model
    {
        $columns = [
            'id', 'author_id', 'text'
        ];

        $comment = Comment::query()
            ->select($columns)
            ->find($id);

        $author = User::query()->find($comment->author_id);
        $comment->setAttribute('author', $author->name);
        return $comment;
    }

    /**
     * @return JsonResponse
     */
    public function change(): JsonResponse
    {
        $data = [
            'id' => (int) htmlspecialchars($_POST['id']),
            'text' => htmlspecialchars($_POST['text'])
        ];

        // Валидатор
        $validator = new CommentValidator($data);

        // Валидация
        if (!$validator->rules()) {
            return $validator->getErrors();
        }

        $this->update($data);
        return $validator->getSuccess();
    }

    /**
     * @param array $data
     * @return void
     */
    public function update(array $data): void
    {
        Comment::query()->where('id', $data['id'])->update([
            'text' => $data['text'],
            'date' => date("Y-m-d H:i:s")
        ]);
    }

    /**
     * @return void
     * @throws \Exception
     */
    public function delete(): void
    {

    }

    /**
     * @return JsonResponse
     */
    public function create(): JsonResponse
    {

    }
}