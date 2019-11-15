<?php

class OrdersTest extends TestCase
{

    public function testGettingAllOrders()
    {
        $this->json('GET', '/api/orders',
            [],
            ['Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImtpZCI6IlFqVXdOemd3TXpnMFJFTTRNakEwTWpVeE1FSXpRVE5GT1RZNU1qQkZRVVkwT1VNMU1VSkRNdyJ9.eyJpc3MiOiJodHRwczovL2NoYW51MTk5My5hdXRoMC5jb20vIiwic3ViIjoialBCcXEwRlJta3E4S1ZDMmpwZGpRNlMxenpNWnkxOENAY2xpZW50cyIsImF1ZCI6ImFkY2FzaGFwaS5jb20iLCJpYXQiOjE1NzM0MDQzMTQsImV4cCI6MTU3MzQ5MDcxNCwiYXpwIjoialBCcXEwRlJta3E4S1ZDMmpwZGpRNlMxenpNWnkxOEMiLCJndHkiOiJjbGllbnQtY3JlZGVudGlhbHMifQ.CrGiA8yuMASmFgnQtXJ0B1JM_hKQZBJbn7iIXbhFwLj308jGivRCnT7pk8BmUiqnwJ6RiesjPbh7f80zEdtEaWCPcsmQYFLiNoqCtu5WCa3woHwHdDatwWF1BYCmRzB9epauJbxphW1cOTOEyjkuLr1an-RvOgTbM0I7bvwR3gBpQuetxRb1NHDPKrymFQbt_bn4xvwapW1JJ97AbmvvI4Bxr-yOpLltvK5TYIFOXn7--Ki5Qxgvj-MadSo9sv2BDYAZnH-p-1gPxANn-R3KmjhpkUXWuINpH_ntTrJnZURtX59eIyaNtTGolKYS82HNpcICF8eGVqyKZL1Ml1oR1Q']);
        $this->seeStatusCode(200);
        $this->seeJsonStructure([
            [
                'id',
                'user_id',
                'product_id',
                'order_qty',
                'total_price',
                'discount',
                'net_total',
                'order_date',
                'created_at',
                'updated_at',
                'full_name',
                'unit_price',
                'name',
            ],

        ]);
    }

    public function testGettingOneOrder()
    {
        $this->json('GET', '/api/orders/1',
            [],
            ['Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImtpZCI6IlFqVXdOemd3TXpnMFJFTTRNakEwTWpVeE1FSXpRVE5GT1RZNU1qQkZRVVkwT1VNMU1VSkRNdyJ9.eyJpc3MiOiJodHRwczovL2NoYW51MTk5My5hdXRoMC5jb20vIiwic3ViIjoialBCcXEwRlJta3E4S1ZDMmpwZGpRNlMxenpNWnkxOENAY2xpZW50cyIsImF1ZCI6ImFkY2FzaGFwaS5jb20iLCJpYXQiOjE1NzM0MDQzMTQsImV4cCI6MTU3MzQ5MDcxNCwiYXpwIjoialBCcXEwRlJta3E4S1ZDMmpwZGpRNlMxenpNWnkxOEMiLCJndHkiOiJjbGllbnQtY3JlZGVudGlhbHMifQ.CrGiA8yuMASmFgnQtXJ0B1JM_hKQZBJbn7iIXbhFwLj308jGivRCnT7pk8BmUiqnwJ6RiesjPbh7f80zEdtEaWCPcsmQYFLiNoqCtu5WCa3woHwHdDatwWF1BYCmRzB9epauJbxphW1cOTOEyjkuLr1an-RvOgTbM0I7bvwR3gBpQuetxRb1NHDPKrymFQbt_bn4xvwapW1JJ97AbmvvI4Bxr-yOpLltvK5TYIFOXn7--Ki5Qxgvj-MadSo9sv2BDYAZnH-p-1gPxANn-R3KmjhpkUXWuINpH_ntTrJnZURtX59eIyaNtTGolKYS82HNpcICF8eGVqyKZL1Ml1oR1Q']);
        $this->seeStatusCode(200);
        $this->seeJsonStructure([

            'id',
            'user_id',
            'product_id',
            'order_qty',
            'total_price',
            'discount',
            'net_total',
            'order_date',
            'created_at',
            'updated_at',

        ]);
    }

    public function testAddingOrder()
    {
        $this->json('POST', '/api/orders',
            [
                'user_id' => '1',
                'product_id' => '1',
                'order_qty' => 88,
                'total_price' => 888,
                'discount' => 20,
                'net_total' => 777,
                'order_date' => '2019-11-13',
            ],
            ['Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImtpZCI6IlFqVXdOemd3TXpnMFJFTTRNakEwTWpVeE1FSXpRVE5GT1RZNU1qQkZRVVkwT1VNMU1VSkRNdyJ9.eyJpc3MiOiJodHRwczovL2NoYW51MTk5My5hdXRoMC5jb20vIiwic3ViIjoialBCcXEwRlJta3E4S1ZDMmpwZGpRNlMxenpNWnkxOENAY2xpZW50cyIsImF1ZCI6ImFkY2FzaGFwaS5jb20iLCJpYXQiOjE1NzM0MDQzMTQsImV4cCI6MTU3MzQ5MDcxNCwiYXpwIjoialBCcXEwRlJta3E4S1ZDMmpwZGpRNlMxenpNWnkxOEMiLCJndHkiOiJjbGllbnQtY3JlZGVudGlhbHMifQ.CrGiA8yuMASmFgnQtXJ0B1JM_hKQZBJbn7iIXbhFwLj308jGivRCnT7pk8BmUiqnwJ6RiesjPbh7f80zEdtEaWCPcsmQYFLiNoqCtu5WCa3woHwHdDatwWF1BYCmRzB9epauJbxphW1cOTOEyjkuLr1an-RvOgTbM0I7bvwR3gBpQuetxRb1NHDPKrymFQbt_bn4xvwapW1JJ97AbmvvI4Bxr-yOpLltvK5TYIFOXn7--Ki5Qxgvj-MadSo9sv2BDYAZnH-p-1gPxANn-R3KmjhpkUXWuINpH_ntTrJnZURtX59eIyaNtTGolKYS82HNpcICF8eGVqyKZL1Ml1oR1Q']);
        $this->seeStatusCode(201);
        $this->seeJsonStructure([
            'user_id',
            'product_id',
            'order_qty',
            'total_price',
            'discount',
            'net_total',
            'order_date',
            'updated_at',
            'created_at',
            'id',
        ]);
    }

    // Need to enter a valid order ID to delete
    public function testDeletingOrder()
    {
        $this->json('DELETE', '/api/orders/8',
            [],
            ['Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImtpZCI6IlFqVXdOemd3TXpnMFJFTTRNakEwTWpVeE1FSXpRVE5GT1RZNU1qQkZRVVkwT1VNMU1VSkRNdyJ9.eyJpc3MiOiJodHRwczovL2NoYW51MTk5My5hdXRoMC5jb20vIiwic3ViIjoialBCcXEwRlJta3E4S1ZDMmpwZGpRNlMxenpNWnkxOENAY2xpZW50cyIsImF1ZCI6ImFkY2FzaGFwaS5jb20iLCJpYXQiOjE1NzM0MDQzMTQsImV4cCI6MTU3MzQ5MDcxNCwiYXpwIjoialBCcXEwRlJta3E4S1ZDMmpwZGpRNlMxenpNWnkxOEMiLCJndHkiOiJjbGllbnQtY3JlZGVudGlhbHMifQ.CrGiA8yuMASmFgnQtXJ0B1JM_hKQZBJbn7iIXbhFwLj308jGivRCnT7pk8BmUiqnwJ6RiesjPbh7f80zEdtEaWCPcsmQYFLiNoqCtu5WCa3woHwHdDatwWF1BYCmRzB9epauJbxphW1cOTOEyjkuLr1an-RvOgTbM0I7bvwR3gBpQuetxRb1NHDPKrymFQbt_bn4xvwapW1JJ97AbmvvI4Bxr-yOpLltvK5TYIFOXn7--Ki5Qxgvj-MadSo9sv2BDYAZnH-p-1gPxANn-R3KmjhpkUXWuINpH_ntTrJnZURtX59eIyaNtTGolKYS82HNpcICF8eGVqyKZL1Ml1oR1Q']);
        $this->seeStatusCode(200);
        $this->seeJsonEquals([
            "message" => "Deleted",
            "code" => 200,
            "value" => true,
        ]);
    }

    public function testDeletingOrderError()
    {
        $this->json('DELETE', '/api/orders/2',
            [],
            ['Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImtpZCI6IlFqVXdOemd3TXpnMFJFTTRNakEwTWpVeE1FSXpRVE5GT1RZNU1qQkZRVVkwT1VNMU1VSkRNdyJ9.eyJpc3MiOiJodHRwczovL2NoYW51MTk5My5hdXRoMC5jb20vIiwic3ViIjoialBCcXEwRlJta3E4S1ZDMmpwZGpRNlMxenpNWnkxOENAY2xpZW50cyIsImF1ZCI6ImFkY2FzaGFwaS5jb20iLCJpYXQiOjE1NzM0MDQzMTQsImV4cCI6MTU3MzQ5MDcxNCwiYXpwIjoialBCcXEwRlJta3E4S1ZDMmpwZGpRNlMxenpNWnkxOEMiLCJndHkiOiJjbGllbnQtY3JlZGVudGlhbHMifQ.CrGiA8yuMASmFgnQtXJ0B1JM_hKQZBJbn7iIXbhFwLj308jGivRCnT7pk8BmUiqnwJ6RiesjPbh7f80zEdtEaWCPcsmQYFLiNoqCtu5WCa3woHwHdDatwWF1BYCmRzB9epauJbxphW1cOTOEyjkuLr1an-RvOgTbM0I7bvwR3gBpQuetxRb1NHDPKrymFQbt_bn4xvwapW1JJ97AbmvvI4Bxr-yOpLltvK5TYIFOXn7--Ki5Qxgvj-MadSo9sv2BDYAZnH-p-1gPxANn-R3KmjhpkUXWuINpH_ntTrJnZURtX59eIyaNtTGolKYS82HNpcICF8eGVqyKZL1Ml1oR1Q']);
        $this->seeStatusCode(404);
    }
}
