<?php

namespace Database\Seeders;

use App\Enums\QuestionTypeEnum;
use App\Enums\RegexEnum;
use App\Models\Question;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $answers = [];
        Question::create([
            'type'              => QuestionTypeEnum::INPUT,
            'question'          => '氏名',
            'csv_header'        => '氏名',
            'answers'           => $answers,
            'have_other_option' => false,
            'order'             => 1,
            'is_required'       => true,
            'options'           => [
                'placeholder' => ['姓', '名'],
                'regex'       => [RegexEnum::FULL, RegexEnum::FULL],
                'count_field' => 2,
            ],
        ]);

        $answers = [];
        Question::create([
            'type'              => QuestionTypeEnum::INPUT,
            'question'          => '氏名（カナ）',
            'csv_header'        => '氏名（カナ）',
            'answers'           => $answers,
            'have_other_option' => false,
            'order'             => 2,
            'is_required'       => true,
            'options'           => [
                'placeholder' => ['セイ', 'メイ'],
                'regex'       => [RegexEnum::FULL, RegexEnum::FULL],
                'count_field' => 2,
            ],
        ]);

        $answers = [];
        Question::create([
            'type'              => QuestionTypeEnum::INPUT,
            'question'          => 'クイズの答え「?」に入る文字を入れてください。',
            'csv_header'        => 'クイズの答え',
            'answers'           => $answers,
            'have_other_option' => false,
            'order'             => 3,
            'is_required'       => true,
            'options'           => [
                'placeholder' => '',
                'regex'       => RegexEnum::FULL,
                'count_field' => 1,
            ],
        ]);

        $answers = [
            'スペイン　マドリード往復ペア航空券　1組2名様',
            '神戸ペア旅行　4組8名様',
        ];
        Question::create([
            'type'              => QuestionTypeEnum::RADIO,
            'question'          => '旅行景品の選択',
            'csv_header'        => '旅行景品の選択',
            'answers'           => $answers,
            'have_other_option' => false,
            'order'             => 4,
            'is_required'       => true,
        ]);

        $answers = [
            '男性',
            '女性',
            '未回答',
        ];
        Question::create([
            'type'              => QuestionTypeEnum::SEGMENTED,
            'question'          => '性別',
            'csv_header'        => '性別',
            'answers'           => $answers,
            'have_other_option' => false,
            'order'             => 5,
            'is_required'       => true,
        ]);

        $answers = [];
        Question::create([
            'type'              => QuestionTypeEnum::INPUT,
            'question'          => '生年月日',
            'csv_header'        => '生年月日',
            'answers'           => $answers,
            'have_other_option' => false,
            'order'             => 6,
            'is_required'       => true,
            'options'           => [
                'placeholder' => ['例）2000', '例）3', '例）17'],
                'regex'       => ['', '', ''],
                'count_field' => 3,
                'after_input' => ['年', '月', '日'],
            ],
        ]);

        $answers = [];
        Question::create([
            'type'              => QuestionTypeEnum::INPUT,
            'question'          => '電話番号',
            'csv_header'        => '電話番号',
            'answers'           => $answers,
            'have_other_option' => false,
            'order'             => 7,
            'is_required'       => true,
            'options'           => [
                'placeholder' => '例）00000000000',
                'regex'       => RegexEnum::NUMBER,
                'count_field' => 1,
            ],
        ]);

        $answers = [];
        Question::create([
            'type'              => QuestionTypeEnum::INPUT,
            'question'          => 'メールアドレス',
            'csv_header'        => 'メールアドレス',
            'answers'           => $answers,
            'have_other_option' => false,
            'order'             => 8,
            'is_required'       => true,
            'options'           => [
                'placeholder' => '',
                'regex'       => RegexEnum::FULL,
                'count_field' => 1,
            ],
        ]);

        $answers = [];
        Question::create([
            'type'              => QuestionTypeEnum::INPUT,
            'question'          => 'メールアドレス（確認用）',
            'csv_header'        => '',
            'answers'           => $answers,
            'have_other_option' => false,
            'order'             => 9,
            'is_required'       => true,
            'options'           => [
                'placeholder' => '',
                'regex'       => RegexEnum::FULL,
                'count_field' => 1,
            ],
        ]);

        $answers = [];
        Question::create([
            'type'              => QuestionTypeEnum::ADDRESS,
            'question'          => '郵便番号',
            'csv_header'        => '郵便番号',
            'answers'           => $answers,
            'have_other_option' => false,
            'order'             => 10,
            'is_required'       => true,
            'options'           => [
                'key'         => 'postcode',
                'placeholder' => '例）0000000',
                'regex'       => RegexEnum::NUMBER,
                'count_field' => 1,
            ],
        ]);

        $answers = [];
        Question::create([
            'type'              => QuestionTypeEnum::ADDRESS,
            'question'          => 'ご住所（都道府県）',
            'csv_header'        => '都道府県',
            'answers'           => $answers,
            'have_other_option' => false,
            'order'             => 11,
            'is_required'       => true,
            'options'           => [
                'key'         => 'prefecture',
                'placeholder' => '選択してください。',
            ],
        ]);

        $answers = [];
        Question::create([
            'type'              => QuestionTypeEnum::ADDRESS,
            'question'          => 'ご住所（市区町村）',
            'csv_header'        => '市区町村',
            'answers'           => $answers,
            'have_other_option' => false,
            'order'             => 12,
            'is_required'       => true,
            'options'           => [
                'key'         => 'city',
                'placeholder' => '例）港区青山',
                'regex'       => RegexEnum::ADDRESS,
                'count_field' => 1,
            ],
        ]);

        $answers = [];
        Question::create([
            'type'              => QuestionTypeEnum::INPUT,
            'question'          => 'ご住所（丁目/番地/号）',
            'csv_header'        => '丁目・番地・号',
            'answers'           => $answers,
            'have_other_option' => false,
            'order'             => 13,
            'is_required'       => true,
            'options'           => [
                'placeholder' => '例）０ー０ー０',
                'regex'       => RegexEnum::ADDRESS,
                'count_field' => 1,
            ],
        ]);

        $answers = [];
        Question::create([
            'type'              => QuestionTypeEnum::INPUT,
            'question'          => 'ご住所（建物/階）',
            'csv_header'        => '建物・階',
            'answers'           => $answers,
            'have_other_option' => false,
            'order'             => 14,
            'is_required'       => false,
            'options'           => [
                'placeholder' => '例）×××××××階　２００号室',
                'regex'       => RegexEnum::ADDRESS,
                'count_field' => 1,
            ],
        ]);

        $answers = [];
        Question::create([
            'type'              => QuestionTypeEnum::PRIVACY,
            'question'          => '個人情報の取り扱いについて',
            'answers'           => $answers,
            'have_other_option' => false,
            'order'             => 15,
            'is_required'       => true,
            'options'           => [
                'description_html' => '<a href="#" target="_blank">プライバシーポリシー</a>に同意する',
            ],
        ]);
    }
}
