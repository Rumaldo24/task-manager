<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'title',
        'description',
        'due_date',
        'status'
    ];
    protected $primaryKey = 'id';
    protected $hidden = [
        'created_at', 'updated_at'];

    public function project() {
        return $this->belongsTo(Project::class, 'project_id', 'id');
    }
}