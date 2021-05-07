<?php


class Seed extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Company_model');
        $this->load->model('User_model');
        $this->load->model('Product_model');
        $this->load->model('Chart_model');
        $this->load->model('Payment_model');
        $this->load->model('Detail_payment_model');
    }

    public function index()
    {
        //seeder companies
        $this->company();

        //seeder user admin
        $this->user();

        //seeder product
        $this->product(10);

        //seeder chart
        // $this->chart(3);

        //seeder payment
        // $this->payment();
    }

    public function empty()
    {
        if ($this->Company_model->empty()) {
            echo 'Empty table company finished <br>';
        }

        if ($this->Product_model->empty()) {
            echo 'Empty table product finished <br>';
        }
        
        if ($this->Chart_model->empty()) {
            echo 'Empty table chart finished <br>';
        }

        if ($this->Detail_payment_model->empty()) {
            echo 'Empty table detail payment finished <br>';
        }

        if ($this->Payment_model->empty()) {
            echo 'Empty table payment finished <br>';
        }
        
        if ($this->User_model->empty()) {
            echo 'Empty table user finished <br>';
        }
    }

    public function rollback()
    {
        $this->empty();
        $this->index();
    }

    private function company()
    {
        $cek = $this->Company_model->all();
        if (count($cek) == 0) {
            $data = [
                'name' => 'MAMAZI',
                'address' => '',
                'description' => 'Sedia Parfume Premium',
                'logo' => 'logo.png',
                'photo' => 'photo.png',
            ];
            $this->Company_model->create($data);
            echo 'Seeder Company finished <br>';
        }
    }

    private function user()
    {
        $cek = $this->User_model->all();
        if (count($cek) == 0) {
            $data = [
                'name' => 'administrator',
                'email' => 'admin@app.com',
                'username' => 'admin@app.com',
                'password' => 'password',
                'address' => '',
                'photo' => 'customer.png',
                'is_admin' => 'Y',
            ];
            $this->User_model->create($data);

            $data = [
                'name' => 'customer',
                'email' => 'customer@app.com',
                'username' => 'customer@app.com',
                'password' => 'password',
                'address' => 'address',
                'photo' => 'customer.png',
                'is_admin' => 'N',
            ];
            $this->User_model->create($data);
            echo 'Seeder Admin finished <br>';
        }
    }

    private function product($count = 1)
    {
        $cek = $this->Product_model->all();
        if (count($cek) == 0) {
            for ($i=0; $i < $count; $i++) {
                $data = [
                    'name' => 'Men Parfume '.$i,
                    'price' => rand(1, 9) * 100000,
                    'category' => 'Men',
                    'description' => 'description',
                    'photo' => 'product-'.$i.'.jpeg',
                ];
                $this->Product_model->create($data);
                echo 'Seeder Product finished '.$i.'<br>';
            }
        }
    }

    private function chart($count = 1)
    {
        $cek = $this->Chart_model->all();
        if (count($cek) == 0) {
            for ($i=0; $i < $count; $i++) {
                $this->db->where('is_admin', 'N');
                $this->db->order_by('rand()');
                $user = $this->db->get('users')->row();
            
                $this->db->order_by('rand()');
                $product = $this->db->get('products')->row();

                $amount = rand(1, 5);
                $data = [
                'user_id' => $user->id,
                'product_id' => $product->id,
                'amount' => $amount,
                'total_price' => $product->price * $amount,
            ];
                $this->Chart_model->create($data);
                echo 'Seeder chart finished '.$i.'<br>';
            }
        }
    }

    public function payment()
    {
        $chart = $this->Chart_model->all();
        $total_price = 0;
        $user_id = 0;
        foreach ($chart as $i) {
            $total_price += $i->total_price;
            $user_id = $i->user_id;
        }

        $data = [
            'user_id' => $user_id,
            'send_to' => 'send to',
            'is_pay' => 'Y',
            'is_delivery' => 'N',
            'is_cancel' => 'N',
            'invoice' => 'invoice',
            'total_payment' => $total_price,
        ];
        $this->Payment_model->create($data);
        $payment_id = $this->db->insert_id();

        foreach ($chart as $i) {
            $product = $this->Product_model->getId($i->product_id);
            $data = [
                'payment_id' => $payment_id,
                'product_id' => $i->product_id,
                'product_name' => $product->name,
                'product_price' => $product->price,
                'product_amount' => $i->amount,
            ];
            $this->Detail_payment_model->create($data);
        }
        
        echo 'Seeder payment finished <br>';
    }
}
