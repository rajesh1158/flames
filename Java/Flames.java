import java.util.ArrayList;
import java.util.List;

class Flames
{
	public static void main(String a[])
	{
		String firstName = a[0];
		String secondName = a[1];
		String flames = "FLAMES";
		List<String> firstArray = new ArrayList<String>();
		List<String> secondArray = new ArrayList<String>();
		List<String> flamesArray = new ArrayList<String>();

		for(int b=0; b<firstName.length(); b++)
		{
			firstArray.add(Character.toString(firstName.charAt(b)));
		}

		for(int b=0; b<secondName.length(); b++)
		{
			secondArray.add(Character.toString(secondName.charAt(b)));
		}

		for(int b=0; b<flames.length(); b++)
		{
			flamesArray.add(Character.toString(flames.charAt(b)));
		}

		int totalLength = 0;

		for(int i=0; i<firstArray.size(); i++)
		{
			for(int j=0; j<secondArray.size(); j++)
			{
				if(firstArray.get(i).equalsIgnoreCase(secondArray.get(j)))
				{				
					firstArray.remove(i);
					secondArray.remove(j);
					break;
				}
			}
		}

		totalLength = firstArray.size() + secondArray.size();

		List<String> tempFlames = flamesArray;
		List<String> temp = new ArrayList<String>();
		
		while(tempFlames.size() > 1)
		{
			int y = totalLength - tempFlames.size() - 1;
			int indexOfRemEle = y % tempFlames.size();

			for(int v=0; v<indexOfRemEle; v++)
			{
				temp.add(tempFlames.get(v));
			}
			
			for(int v=0; v<temp.size(); v++)
			{
				tempFlames.remove(0);
				tempFlames.add(temp.get(v));
			}		
			
			tempFlames.remove(0);
		}

		if(tempFlames.get(0).equals("F"))
		{
			System.out.println("\nFriends");
		}
		else if(tempFlames.get(0).equals("L"))
		{
			System.out.println("\nLove");
		}
		else if(tempFlames.get(0).equals("A"))
		{
			System.out.println("\nAffection");
		}
		else if(tempFlames.get(0).equals("M"))
		{
			System.out.println("\nMarry");
		}
		else if(tempFlames.get(0).equals("E"))
		{
			System.out.println("\nEnemy");
		}
		else
		{
			System.out.println("\nSister");
		}
	}	
}