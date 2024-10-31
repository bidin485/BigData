<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $primaryKey = 'task_id'; // Specify the custom primary key

    protected $fillable = [
        'title',
        'description',
        'assigned_research_assistant_id',
        'patron_id',
        'priority',
        'status',
        'due_date',
        'date_assigned',
    ];
}
