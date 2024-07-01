<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Salary;
use App\Models\Vacancy;
use Livewire\Component;
use Livewire\WithFileUploads;

class VacancyCreate extends Component
{
    public $title;
    public $salary;
    public $category;
    public $company;
    public $last_date;
    public $description;
    public $image;

    use WithFileUploads;

    protected $rules = [
        'title' => 'required|string',
        'salary' => 'required',
        'category' => 'required',
        'company' => 'required',
        'last_date' => 'required',
        'description' => 'required',
        'image' => 'required|image|max:1024',
    ];

    public function render()
    {
        $salaries = Salary::all();
        $categories = Category::all();

        return view('livewire.vacancy-create', [
            'salaries' => $salaries,
            'categories' => $categories,
        ]);
    }

    public function saveVacancy()
    {
        $data = $this->validate();

        $imagePath      = 'public/vacancies';
        $imageFile      = $this->image->store($imagePath);
        $data['image']  = str_replace($imagePath.'/', '', $imageFile);

        Vacancy::create([
            'title'         => $data['title'],
            'salary_id'     => $data['salary'],
            'category_id'   => $data['category'],
            'company'       => $data['company'],
            'last_date'     => $data['last_date'],
            'description'   => $data['description'],
            'image'         => $data['image'],
            'user_id'       => auth()->user()->id,
        ]);

        session()->flash('message', 'La vacante se publicó correctamente');

        return redirect()->route('vacancies.index');
    }
}
