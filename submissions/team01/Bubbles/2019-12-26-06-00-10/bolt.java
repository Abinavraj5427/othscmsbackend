import java.util.*;
import java.io.*;
public class bolt{

    public static void main(String[] args) throws Exception
    {
        Scanner sc = new Scanner(new File("bolt.dat"));
        int lines = Integer.parseInt(sc.nextLine());
        while(sc.hasNextLine())
        {
            String side = "front";
            int amount = Integer.parseInt(sc.nextLine());
            int spaces = 0;
            int frontamount = 0;
            int backamount = 0;
            while(amount > 0)
            {
               
                if(side.equals("front"))
                {
                    spaces = 0;
                    spaces +=frontamount;
                    for(int x = amount;x>0;x--)
                    {
                        for(int y=0;y<spaces;y++)
                        {
                            System.out.print(" ");
                        }
                        System.out.print("\\\n");
                        spaces++;
                    }
                    frontamount++;
                }

                else if(side.equals("back"))
                {
                    spaces = amount;
                    spaces +=backamount;
                    for(int x = amount;x>0;x--)
                    {
                        for(int y=0;y<spaces;y++)
                        {
                            System.out.print(" ");
                        }
                        System.out.print("/\n");
                        spaces--;
                    }
                    backamount++;
                }
                amount --;
                if(side.equals("front"))
                    side = "back";
                else
                    side = "front";
            }
            System.out.print("\n");
        }
        
       

    }
}