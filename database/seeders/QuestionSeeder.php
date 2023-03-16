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
            'type'              => QuestionTypeEnum::MULTI_INPUT,
            'title'             => '氏名',
            'csv_header'        => '氏名',
            'answers'           => $answers,
            'have_other_option' => false,
            'order'             => 1,
            'is_required'       => true,
            'options'           => [
                'key'         => 'name',
                'annotation'  => '※全角でご入力ください。',
                'placeholder' => ['姓', '名'],
                'regex'       => [RegexEnum::FULL_WITHOUT_SPECIAL, RegexEnum::FULL_WITHOUT_SPECIAL],
                'count_field' => 2,
                'max_length'  => [20, 20],
                'min_length'  => [1, 1],
            ],
        ]);

        $answers = [];
        Question::create([
            'type'              => QuestionTypeEnum::MULTI_INPUT,
            'title'             => '氏名（カナ）',
            'csv_header'        => '氏名（カナ）',
            'answers'           => $answers,
            'have_other_option' => false,
            'order'             => 2,
            'is_required'       => true,
            'options'           => [
                'key'         => 'name_kana',
                'annotation'  => '※全角でご入力ください。',
                'placeholder' => ['セイ', 'メイ'],
                'regex'       => [RegexEnum::KATA_FULL_WIDTH, RegexEnum::KATA_FULL_WIDTH],
                'count_field' => 2,
                'max_length'  => [30, 30],
                'min_length'  => [1, 1],
            ],
        ]);

        $answers = [];
        Question::create([
            'type'              => QuestionTypeEnum::INPUT,
            'title'             => 'クイズの答え「?」に入る文字を入れてください。',
            'csv_header'        => 'クイズの答え',
            'answers'           => $answers,
            'have_other_option' => false,
            'order'             => 3,
            'is_required'       => true,
            'options'           => [
                'key'         => 'answer',
                'placeholder' => '',
                'regex'       => RegexEnum::FULL_WITHOUT_SPECIAL,
                'count_field' => 1,
                'max_length'  => 20,
                'min_length'  => 1,
            ],
        ]);

        $answers = [
            'スペイン　マドリード往復ペア航空券　1組2名様',
            '神戸ペア旅行　4組8名様',
        ];
        Question::create([
            'type'              => QuestionTypeEnum::RADIO,
            'title'             => '旅行景品の選択',
            'csv_header'        => '旅行景品の選択',
            'answers'           => $answers,
            'have_other_option' => false,
            'order'             => 4,
            'is_required'       => true,
            'options'           => [
                'key' => 'course_apply',
            ],
        ]);

        $answers = [
            '男性',
            '女性',
            '未回答',
        ];
        Question::create([
            'type'              => QuestionTypeEnum::SEGMENTED,
            'title'             => '性別',
            'csv_header'        => '性別',
            'answers'           => $answers,
            'have_other_option' => false,
            'order'             => 5,
            'is_required'       => true,
            'options'           => [
                'key' => 'gender',
            ],
        ]);

        $answers = [];
        Question::create([
            'type'              => QuestionTypeEnum::BIRTHDAY,
            'title'             => '生年月日',
            'csv_header'        => '生年月日',
            'answers'           => $answers,
            'have_other_option' => false,
            'order'             => 6,
            'is_required'       => true,
            'options'           => [
                'key'         => 'birthday',
                'placeholder' => ['例）2000', '例）3', '例）17'],
                'regex'       => RegexEnum::BIRTHDAY,
                'count_field' => 3,
                'after_input' => ['年', '月', '日'],
            ],
        ]);

        $answers = [];
        Question::create([
            'type'              => QuestionTypeEnum::INPUT,
            'title'             => '電話番号',
            'csv_header'        => '電話番号',
            'answers'           => $answers,
            'have_other_option' => false,
            'order'             => 7,
            'is_required'       => true,
            'options'           => [
                'key'         => 'phone',
                'annotation'  => '※半角数字、ハイフンを入れずにご入力ください。',
                'placeholder' => '例）00000000000',
                'regex'       => RegexEnum::NUMBER,
                'count_field' => 1,
                'min_length'  => 10,
                'max_length'  => 11,
            ],
        ]);

        $answers = [];
        Question::create([
            'type'              => QuestionTypeEnum::EMAIL,
            'title'             => 'メールアドレス',
            'csv_header'        => 'メールアドレス',
            'answers'           => $answers,
            'have_other_option' => false,
            'order'             => 8,
            'is_required'       => true,
            'options'           => [
                'key'          => 'email',
                'placeholder'  => '',
                'regex'        => RegexEnum::EMAIL,
                'count_field'  => 1,
                'annotation'   => '※半角英数字でご入力ください。',
                'confirm_with' => 9,
                'max_length'   => 60,
                'min_length'   => 1,
            ],
        ]);

        $answers = [];
        Question::create([
            'type'              => QuestionTypeEnum::EMAIL,
            'title'             => 'メールアドレス（確認用）',
            'answers'           => $answers,
            'have_other_option' => false,
            'order'             => 9,
            'is_required'       => true,
            'options'           => [
                'placeholder' => '',
                'regex'       => RegexEnum::EMAIL,
                'count_field' => 1,
                'annotation'  => '※半角英数字でご入力ください。',
                'max_length'  => 60,
                'min_length'  => 1,
            ],
        ]);

        $answers = [];
        Question::create([
            'type'              => QuestionTypeEnum::ADDRESS,
            'title'             => '郵便番号',
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
                'annotation'  => '※半角数字、ハイフンを入れずにご入力ください。',
                'max_length'  => 7,
                'min_length'  => 7,
            ],
        ]);

        $answers = [];
        Question::create([
            'type'              => QuestionTypeEnum::ADDRESS,
            'title'             => 'ご住所（都道府県）',
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
            'title'             => 'ご住所（市区町村）',
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
                'max_length'  => 60,
                'min_length'  => 1,
            ],
        ]);

        $answers = [];
        Question::create([
            'type'              => QuestionTypeEnum::INPUT,
            'title'             => 'ご住所（丁目/番地/号）',
            'csv_header'        => '丁目・番地・号',
            'answers'           => $answers,
            'have_other_option' => false,
            'order'             => 13,
            'is_required'       => true,
            'options'           => [
                'key'         => 'street',
                'placeholder' => '例）０ー０ー０',
                'regex'       => RegexEnum::ADDRESS,
                'count_field' => 1,
                'max_length'  => 60,
                'min_length'  => 1,
            ],
        ]);

        $answers = [];
        Question::create([
            'type'              => QuestionTypeEnum::INPUT,
            'title'             => 'ご住所（建物/階）',
            'csv_header'        => '建物・階',
            'answers'           => $answers,
            'have_other_option' => false,
            'order'             => 14,
            'is_required'       => false,
            'options'           => [
                'key'         => 'building',
                'placeholder' => '例）×××××××階　２００号室',
                'regex'       => RegexEnum::ADDRESS,
                'count_field' => 1,
                'max_length'  => 60,
                'min_length'  => 1,
            ],
        ]);

        $answers = [];
        Question::create([
            'type'              => QuestionTypeEnum::PRIVACY,
            'title'             => '個人情報の取り扱いについて',
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
