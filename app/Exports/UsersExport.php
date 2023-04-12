<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class UsersExport implements FromCollection, WithMapping, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return User::all();
    }

    public function map($user): array
    {
        return [
            $user->id,
            $user->name,
            $user->email,
            $user->facebook_id,
            $user->data?->get('hurdle_process'),
            $user->data?->get('source_id'),
            $user->data?->get('budgetForIngredients'),
            implode('|', $user->data?->get('diets') ?? []),
            $user->data?->get('meals'),
            implode('|', $user->data?->get('favoriteCuisines') ?? []),
            implode('|', $user->data?->get('foodGoals') ?? []),
            implode('|', $user->data?->get('restrictions') ?? []),
            $user->data?->get('peopleChefServe'),
            $user->data?->get('serviceUsageFrequency'),
        ];
    }

    public function headings(): array
    {
        return [
            '#',
            'Name',
            'Email',
            'Facebook id',
            'Hurdle process',
            'Source id',
            'Budget For Ingredients',
            'Diets',
            'Meals',
            'Favorite cuisines',
            'Food goals',
            'Restrictions',
            'How many people would Chef serve?',
            'Service usage frequency',
        ];
    }
}
